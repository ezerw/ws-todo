<?php

namespace App\Console;

use App\Jobs\CalculateUncompletedTotal;
use App\Jobs\RemoveOldTotals;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Update or Insert new uncompleted totals per minute
        $schedule->job(new CalculateUncompletedTotal)->everyMinute();

        // Delete transactions older than an hour ago
        $schedule->job(new RemoveOldTotals)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
