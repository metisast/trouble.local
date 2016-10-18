<?php

namespace App\Events;

use App\Events\Event;
use App\Models\Task;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeleteTaskEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    protected $task;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['task'];
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->task->id,
        ];
    }

    public function broadcastAs()
    {
        return 'delete';
    }
}
