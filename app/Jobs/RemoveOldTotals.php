<?php

namespace App\Jobs;

use App\Ws\OldTotalRemover;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class RemoveOldTotals
 *
 * @package App\Jobs
 */
class RemoveOldTotals implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new OldTotalRemover)->execute();
    }
}
