<?php

namespace App\Listeners;

use App\Events\AssetAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LookForSpecsMatch
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AssetAdded  $event
     * @return void
     */
    public function handle(AssetAdded $event)
    {
        // data[] = $event->info
        //
        //get info into an array

        //run query with an array

        //if got results, dispatch event 'new client match'
    }
}
