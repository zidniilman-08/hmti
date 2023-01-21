<?php

namespace App\Listeners;

use App\Events\NotifusEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifusListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotifusEvent  $event
     * @return void
     */
    public function handle(NotifusEvent $event)
    {
        return $event;
    }
}
