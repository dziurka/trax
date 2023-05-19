<?php

namespace App;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as Kernel;

class ConsoleKernel extends Kernel
{
    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule): void
    {

    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Console/Commands');

        require base_path('routes/console.php');
    }
}
