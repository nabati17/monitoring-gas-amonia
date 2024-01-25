<?php

namespace App\RabbitMQ;

use App\Models\GasLevel;
use Illuminate\Support\Facades\Log;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\DB; // Import DB

class GasLevelConsumer
{
    private $output;

    public function setOutput(ConsoleOutput $output)
    {
        $this->output = $output;
    }

    public function consume()
    {

        $config = config('rabbitmq');

        $connection = new AMQPStreamConnection(
            $config['host'],
            $config['port'],
            $config['login'],
            $config['password'],
            $config['vhost']
        );

        $channel = $connection->channel();

        $channel->queue_declare(
            $config['queue']['name'],
            false,
            true,
            false,
            false
        );

        $channel->exchange_declare(
            $config['exchange']['name'],
            $config['exchange']['type'],
            false,
            true,
            false
        );

        $channel->queue_bind(
            $config['queue']['name'],
            $config['exchange']['name']
        );

        $callback = function ($msg) {
    $payload = $msg->body;
    $this->output->writeln('Received payload: ' . $payload);

    try {
        $data = json_decode($payload, true);

        $this->output->writeln('Decoded data: ' . json_encode($data, JSON_PRETTY_PRINT));

        if (isset($data['data'])) {
            // Debugging: Tampilkan sebelum menyimpan ke database
            $this->output->writeln('Before saving to the database');

            // Log: Sebelum menyimpan ke database
            Log::info('Before saving to the database');

            // Coba simpan ke database
            $this->saveToDatabase($data['data']);

            // Debugging: Tampilkan setelah menyimpan ke database
            $this->output->writeln('After saving to the database');

            // Log: Setelah menyimpan ke database
            Log::info('After saving to the database');
        } else {
            Log::error('Invalid or missing "data" key in data:', ['data' => $data]);
        }
    } catch (\Exception $e) {
        Log::error('Error processing payload:', ['error' => $e->getMessage(), 'payload' => $payload]);
    }

    $msg->ack();
};

        $channel->basic_consume(
            $config['queue']['name'],
            '',
            false,
            false,
            false,
            false,
            $callback
        );

        while ($channel->is_consuming()) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }


private function saveToDatabase($gasLevel)
{
    Log::info('Trying to save to the database: ' . $gasLevel);

    try {
        $gasRecord = GasLevel::firstOrNew(['gas_level' => $gasLevel]);
        $gasRecord->update(['gas_level' => $gasLevel]);

        if ($gasRecord->wasRecentlyCreated) {
            $this->output->writeln('New gas level created in the database: ' . $gasLevel);
        } else {
            $this->output->writeln('Gas level updated in the database: ' . $gasLevel);
        }
    } catch (\Exception $e) {
        Log::error('Error while saving to database:', ['error' => $e->getMessage()]);
    }
}

}