<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\User;
use App\Http\Resources\UserResource;

class NewOrderEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $user;

    public $order;

    public function __construct(User $user, Order $order)
    {
        //
        $this->user = $user;
        $this->order = $order;
    }

    public function broadcastWith(){
        return [
            'order' => '',
            'user' => ''
            //'product' => ProductResource::make($this->product)
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('NewOrder');
    }

    public function broadcastAs()
    {
        return 'new.order';
    }
}
