<?php

namespace App\Listeners;

use App\Events\CrafCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCrafNotification
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
     * @param  CrafCreated  $event
     * @return void
     */
    public function handle(CrafCreated $event)
    {
        //
    }
}
