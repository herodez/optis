<?php

namespace App\Listeners;

use App\Events\RepositoryUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class RunSatisBuild
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
     * @param  RepositoryUpdated  $event
     * @return void
     */
    public function handle(RepositoryUpdated $event)
    {
        Artisan::call('repository:satis:build');
    }
}
