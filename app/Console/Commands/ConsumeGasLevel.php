<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\RabbitMQ\GasLevelConsumer;
use Symfony\Component\Console\Output\ConsoleOutput;

class ConsumeGasLevel extends Command
{
    protected $signature = 'consume:gas-level';
    protected $description = 'Consume Gas Level messages from RabbitMQ';

    public function handle()
    {
        $consumer = new GasLevelConsumer();

        // Mengatur output callback ke konsol perintah
        $output = new ConsoleOutput();
        $consumer->setOutput($output);

        $consumer->consume();
    }
}
