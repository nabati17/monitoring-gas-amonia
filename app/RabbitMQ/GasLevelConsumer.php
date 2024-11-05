<?php

namespace App\RabbitMQ;

use App\Models\GasLevel;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\DB;
use PhpAmqpLib\Exception\AMQPTimeoutException;

class GasLevelConsumer
{
    private $output;
    private $config;

    public function setOutput(ConsoleOutput $output)
    {
        $this->output = $output;
    }

    public function consume()
    {
        $this->config = config('rabbitmq');
        Log::info('RabbitMQ configuration:', $this->config); 

        while (true) {
            try {
                $this->connectAndConsume();
            } catch (\Exception $e) {
                Log::error('Error during consume, retrying:', [
                    'error' => $e->getMessage(),
                    'stack' => $e->getTraceAsString(),
                ]);
                sleep(5); // Tunggu beberapa detik sebelum mencoba kembali
            }
        }
    }

    private function connectAndConsume()
    {
        $connection = new AMQPStreamConnection(
            $this->config['host'],
            $this->config['port'],
            $this->config['login'],
            $this->config['password'],
            $this->config['vhost']
        );

        $channel = $connection->channel();

        $channel->queue_declare(
            $this->config['queue']['name'],
            false,
            true,
            false,
            false
        );

        $channel->exchange_declare(
            $this->config['exchange']['name'],
            $this->config['exchange']['type'],
            false,
            true,
            false
        );

        $channel->queue_bind(
            $this->config['queue']['name'],
            $this->config['exchange']['name']
        );

        $callback = function ($msg) {
            $payload = $msg->body;
            $this->output->writeln('Received payload: ' . $payload);

            try {
                $data = json_decode($payload, true);

                if ($data === null) {
                    throw new \Exception('Failed to decode JSON');
                }
                $this->output->writeln('Decoded data: ' . json_encode($data, JSON_PRETTY_PRINT));
                
                // Periksa apakah kunci 'data' ada
                if (isset($data['data'])) {
                    $gasLevel = $data['data'];
                    // Debugging: Tampilkan sebelum menyimpan ke database
                    $this->output->writeln('Before saving to the database');

                    // Log: Sebelum menyimpan ke database
                    Log::info('Before saving to the database');

                    // Coba simpan ke database
                    $this->saveToDatabase($gasLevel);

                    // Debugging: Tampilkan setelah menyimpan ke database
                    $this->output->writeln('After saving to the database');

                    // Log: Setelah menyimpan ke database
                    Log::info('After saving to the database');

                    // Acknowledge pesan setelah sukses menyimpan ke database
                    $msg->ack();
                } else {
                    Log::error('Invalid or missing "data" key in data:', ['data' => $data]);
                    $msg->ack(); // Ack tetap dilakukan untuk menghindari loop tanpa akhir
                }
            } catch (\Exception $e) {
                Log::error('Error processing payload:', ['error' => $e->getMessage(), 'payload' => $payload]);
                $msg->ack(); // Ack tetap dilakukan untuk menghindari loop tanpa akhir
            }
        };

        $channel->basic_consume(
            $this->config['queue']['name'],
            '',
            false,
            false,
            false,
            false,
            $callback
        );

        try {
            while ($channel->is_consuming()) {
                $channel->wait(null, false, 10); // Timeout 10 detik
            }
        } catch (AMQPTimeoutException $e) {
            Log::warning('RabbitMQ consumer timeout, reconnecting...');
            // Tutup koneksi jika timeout
            $channel->close();
            $connection->close();
            throw $e;
        }

        $channel->close();
        $connection->close();
    }

    private function saveToDatabase($gasLevel)
    {
        Log::info('Trying to save to the database: ' . $gasLevel);

        try {
            // Pastikan $gasLevel adalah string atau number
            if (!is_string($gasLevel) && !is_numeric($gasLevel)) {
                throw new \Exception('Invalid gas level data: ' . print_r($gasLevel, true));
            }

            // Tambahkan gas level baru ke dalam database
            GasLevel::create(['gas_level' => $gasLevel]);

            // Hitung jumlah entri dalam tabel
            $count = GasLevel::count();

            // Jika jumlah entri lebih dari 100, hapus entri paling lama
            if ($count > 100) {
                $oldest = GasLevel::orderBy('created_at', 'asc')->first();
                if ($oldest) {
                    $oldest->delete();
                }
            }

            $this->output->writeln('Gas level added to the database: ' . $gasLevel);
            Log::info('Gas level added to the database: ' . $gasLevel);
        } catch (\Exception $e) {
            Log::error('Error while saving to database:', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);
            $this->output->writeln('Error while saving to database: ' . $e->getMessage());
        }
    }
}
