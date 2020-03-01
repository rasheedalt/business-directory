<?php

namespace App\Listners;

use App\Business;
use App\Events\BusinessViewed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementView
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  BusinessViewed  $event
     * @return void
     */
    public function handle(BusinessViewed $event)
    {
        $business = Business::find($event->id);
        $business->view +=1;
        $business->save();
    }
}
