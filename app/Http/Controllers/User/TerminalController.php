<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TerminalHistory;
use App\Models\TerminalPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;
use Throwable;

class TerminalController extends Controller
{
    public function index()
    {
        return view('dashboard.user.terminal.index', [
            'title' => 'Terminal',
            'active' => 'terminal',
            'terminals' => TerminalPermission::where('user_id', auth()->user()->id)->where('status', 1)->latest()->get()
        ])->with('i');
    }

    public function terminal(TerminalPermission $terminalpermission)
    {
        return view('dashboard.user.terminal.run', [
            'title' => "Terminal Panel",
            'active' => 'terminal',
            'terminal' => $terminalpermission,
            'totalExe' => TerminalHistory::where('terminalpermission_id', $terminalpermission->id)->count(),
            'totalSuccessExe' => TerminalHistory::where('terminalpermission_id', $terminalpermission->id)->where('status', 'success')->count(),
            'totalErrorExe' => TerminalHistory::where('terminalpermission_id', $terminalpermission->id)->where('status', 'error')->count(),
            'histories' => TerminalHistory::where('terminalpermission_id', $terminalpermission->id)->latest()->paginate(5)->withQueryString()
        ]);
    }

    public function execute(Request $request, TerminalPermission $terminalpermission)
    {
        try {
            $process = Process::path($terminalpermission->hook->path)->run($request->command);

            $error = $process->errorOutput();
            $success = $process->output();
            $status = $process->failed() ? "error" : "success";

            TerminalHistory::create([
                'terminalpermission_id' => $terminalpermission->id,
                'status' => $status,
                'command' => $request->command,
                'payload' => '' . $error . PHP_EOL.'============' . PHP_EOL.$success . '',
            ]);

            return back()->with('successPost', 'Command berhasil di eksekusi, silahkan lihat status di history bawah!!');
        } catch (Throwable $e) {
            TerminalHistory::create([
                'terminalpermission_id' => $terminalpermission->id,
                'status' => 'error',
                'command' => $request->command,
                'payload' => $e,
            ]);

            return back()->with('successDelete', 'Command gagal di eksekusi, silahkan lihat status di history bawah!!');
        }
    }
}
