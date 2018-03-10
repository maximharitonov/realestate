<?php

namespace App\Listeners;

use App\Events\SpecsAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LookForAssetsMatch
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
     * @param  SpecsAdded  $event
     * @return void
     */
    public function handle(SpecsAdded $event)
    {
        // data[] = $event->specs
        //
        //get specs into an array

        //run query with an array

        //if got results, dispatch event 'new assets match'
    }
}
