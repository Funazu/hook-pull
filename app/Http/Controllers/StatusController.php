<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use App\Models\Log;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function index()
    {
        return view('dashboard.status.index', [
            'title' => 'Public Status',
            'active' => 'public-status',
            'hooks' => Hook::all(),
            'statuses' => Status::where('status', 1)->latest()->get()
        ])->with('i');
    }

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'hook_id' => 'required'
        ]);

        $validatedData['id_status'] = Str::uuid()->toString();
        Status::create($validatedData);
        return back()->with('successPost', "Public Status has been created!");
    }

    public function delete(Status $status)
    {
        $status->update(['status' => false]);
        return back()->with('successDelete', "Public Status has been deleted!");
    }

    public function status(Status $status)
    {
        return view('status.index', [
            'title' => $status->title,
            'logs' => Log::where('hook_id', $status->hook_id)->latest()->paginate(10)->withQueryString()
        ]);
    }
}
