<?php

namespace App\Console\Commands;

use App\Models\Program;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status program';

    /**
     * @return void
     */
    public function handle(): void
    {
        $program = Program::all();
        foreach ($program as $data) {
            if (now()->toDateString() > $data->end_program && $data->status == 'Aktif') {
                DB::table('programs')->where('id', '=', $data->id)->update([
                    'status' => 'Non Aktif'
                ]);
            }
        }
    }
}
