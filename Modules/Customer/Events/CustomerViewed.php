<?php

namespace Modules\Customer\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Customer\Models\Customer;

class CustomerViewed
{
    use SerializesModels;

    public $customer;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
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
