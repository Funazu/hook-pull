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
    public function webhook(Request $request, Hook $hook)
    {
        $webhook = DB::table('hooks')->where('id', $hook->id)->first();
        $meta = [
            'message' => $request->input('head_commit.message') ?? "MANUAL",
            'commands' => $hook->commands
        ];
        try {
            $process = Process::path($webhook->path)->run($webhook->commands);
            if ($process->errorOutput()) {
                Log::create([
                    'hook_id' => $webhook->id,
                    'meta' => $meta,
                    'status' => 'error',
                    'payload' => $process->errorOutput(),
                ]);
                $response = [
                    'status' => 'error',
                    'result' => $process->errorOutput()
                ];
                return response()->json($response, Response::HTTP_BAD_REQUEST);
            }
            if ($process->output()) {
                // echo $process->output();
                Log::create([
                    'hook_id' => $webhook->id,
                    'meta' => $meta,
                    'status' => 'success',
                    'payload' => $process->output()
                ]);
                $response = [
                    'status' => 'success',
                    'result' => $process->output()
                ];
                return response()->json($response, Response::HTTP_OK);
            }
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
