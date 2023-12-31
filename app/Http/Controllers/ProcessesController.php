<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hook;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Process;
use Throwable;
use Illuminate\Http\Response;

class ProcessesController extends Controller
{
    public function webhook(Request $request, Hook $hook) {
        $webhook = DB::table('hooks')->where('id', $hook->id)->first();
        $meta = [
            'message' => empty($request->input('head_commit.message')) ? "MANUAL" : $request->input('head_commit.message') ?? "MANUAL",
            'commands' => $hook->commands
        ];
        try {
            $commands = str_replace(["\r", "\n"], " ", $webhook->commands);
            $process = Process::path($webhook->path)->run($commands);

            $error = $process->errorOutput();
            $success = $process->output();
            $status = $process->failed() ? "error" : "success";

            Log::create([
                'hook_id' => $webhook->id,
                'meta' => $meta,
                'status' => $status,
                'payload' => '' . $error . PHP_EOL.'============' . PHP_EOL.$success . '',
            ]);
            $response = [
                'status' => $status,
                'result' => $process->failed() ? $process->errorOutput() : $process->output()
            ];
            return response()->json($response, $process->failed() ? Response::HTTP_BAD_REQUEST : Response::HTTP_OK);
        } catch (Throwable $e) {
            Log::create([
                'hook_id' => $webhook->id,
                'meta' => $meta,
                'status' => 'error',
                'payload' => $e
            ]);
            $response = [
                'status' => 'error',
                'result' => $e
            ];
            return response()->json($response, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
