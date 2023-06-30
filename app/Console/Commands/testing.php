<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Process;
use Throwable;
use Illuminate\Support\Facades\DB;

class testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $ini = DB::table('hooks')->where('id', 3)->first();

        try {
            // foreach($ini as $data) {
                $process = Process::path($ini->path)->run($ini->commands);
                if($process->output()) {
                    echo $process->output();
                }
                if($process->errorOutput()) {
                    echo $process->errorOutput();
                }
                // echo $data->commands;
            // }

        } catch (Throwable $e) {
            //throw $th;
            // echo $e;
        }
    }
}
