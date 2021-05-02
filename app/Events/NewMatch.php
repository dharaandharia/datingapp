<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMatch implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $match;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($match)
    {
        $this->match = $match;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('match.'.$this->match->user_id);
    }

    public function broadcastWith(){
        return[
            'chat_id' => $this->match->chat_id,
            'match_with' => $this->match->match_with,
            'profile_picture' => $this->match->matchWith->information->profile_picture,
            'first_name' => $this->match->matchWith->information->first_name,
            'last_name' => $this->match->matchWith->information->last_name,
            'last_message' => $this->match->chat->last_message
        ];
    }
}
