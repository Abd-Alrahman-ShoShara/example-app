<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class HelloWorldEvent implements ShouldBroadcastNow
{
    use SerializesModels;
    
    public $message;
    
    public function __construct()
    {
        $this->message = "Hello World";
    }
    
    public function broadcastOn()
    {
        return new Channel('hello-world');
    }
    
    public function broadcastAs()
    {
        return 'HelloWorldEvent';
    }
}