<?php

namespace App\Console;

use App\Models\Program;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $program = Program::all();
            foreach ($program as $data) {
                if ($data->end_program == now()->toDateString() && $data->status != 'Non Aktif') {
                    Program::where('id', '=', $data->id)->update([
                        'status' => 'Non Aktif'
                    ]);
                }
            }
        })->everyMinute();
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
