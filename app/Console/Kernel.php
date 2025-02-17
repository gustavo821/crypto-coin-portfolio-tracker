<?php

namespace App\Console;

use App\Console\Commands\SaveCoinPricesFromCoinGecko;
use App\Console\Commands\UpdateDataFromCoinGecko;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(UpdateDataFromCoinGecko::Class)->everyFourHours();
        $schedule->command(SaveCoinPricesFromCoinGecko::Class)->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
