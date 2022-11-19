<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RestoreContactListener
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
    public function handle($event)
    {
        $contact = $event->contact;
        $contact->is_deleted = false;  
        $contact->delete_user_id = null;      
        $contact->delete_timestamp = null;
        $contact->restore_timestamp = now();
        $contact->update();    
    }
}
