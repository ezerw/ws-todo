<?php

namespace App\Jobs;

use App\Ws\TotalCalculator;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

/**
 * Class CalculateUncompletedTotal
 *
 * @package App\Jobs
 */
class CalculateUncompletedTotal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        (new TotalCalculator)->execute();
    }
}
