<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\RabbitMQ\GasLevelConsumer;
use Symfony\Component\Console\Output\ConsoleOutput;

class ConsumeGasLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:gas-level';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume gas level messages from RabbitMQ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $output = new ConsoleOutput();
        $consumer = new GasLevelConsumer();
        $consumer->setOutput($output);
        $consumer->consume();

        return 0;
    }
}
