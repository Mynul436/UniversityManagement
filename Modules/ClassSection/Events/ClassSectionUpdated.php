<?php

namespace Modules\ClassSection\Events;

use Illuminate\Queue\SerializesModels;
use Modules\ClassSection\Models\ClassSection;

class ClassSectionUpdated
{
    use SerializesModels;

    public $country;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ClassSection $country)
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
