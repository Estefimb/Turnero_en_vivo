<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;


class MessagePosted implements ShouldBroadcastNow
{
    use SerializesModels;

    public function __construct(public Message $message) {}

    public function broadcastOn(): Channel
    {
        return new Channel('chat');
    }

    public function broadcastAs(): string
    {
        return 'message.posted';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'user' => $this->message->user,
            'content' => $this->message->content,
            'created_at' =>
            $this->message->created_at->toDateTimeString(),
        ];
    }
}
