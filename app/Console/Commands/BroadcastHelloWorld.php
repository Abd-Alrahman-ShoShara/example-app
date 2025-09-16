<?php

namespace App\Console\Commands;

use App\Events\HelloWorldEvent;
use Illuminate\Console\Command;

class BroadcastHelloWorld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:broadcast-hello-world';
    protected $signature = 'broadcast:helloworld';
    protected $description = 'Broadcast Hello World every 5 seconds';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         while (true) {
            event(new HelloWorldEvent());
            $this->info("Hello World broadcasted!");
            sleep(5);
        }
    }
}
