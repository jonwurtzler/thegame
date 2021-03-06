<?php

namespace App\Console;

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
         Commands\GetPointsCommand::class,
         Commands\GetPlayerEffectsCommand::class,
         Commands\UseItemCommand::class,
         Commands\UseNextItemCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('game:effects')->everyMinute();
        $schedule->command('game:nextItem')->everyMinute();
    }
}
