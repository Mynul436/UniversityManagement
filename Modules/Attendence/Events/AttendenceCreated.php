<?php

namespace Modules\Attendence\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Attendence\Models\Attendence;

class AttendenceCreated
{
    use SerializesModels;

    public $country;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Attendence $country)
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
