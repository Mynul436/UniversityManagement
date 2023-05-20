<?php

namespace Modules\Result\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Result\Models\Result;

class ResultCreated
{
    use SerializesModels;

    public $country;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Result $country)
    {
        $this->country = $country;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
