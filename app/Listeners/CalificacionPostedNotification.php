<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\CalificacionPosted;
class CalificacionPostedNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(CalificacionPosted $event)
    {
        //
        error_log('Calificacion Event recieved');
        error_log((string) $event->calificacion);
    }
}
