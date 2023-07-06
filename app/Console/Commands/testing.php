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
        $ini = DB::table('hooks')->where('id', 2)->first();

        try {
            // foreach($ini as $data) {
            $commands = str_replace(["\r", "\n"], " ", $ini->commands);
            $process = Process::path($ini->path)->run($commands);

            $error = $process->errorOutput();
            $success = $process->output();
            $status = empty($error) ? "success" : "error";



            print_r($status);

        } catch (Throwable $e) {
            //throw $th;
            // echo $e;
        }
    }
}
