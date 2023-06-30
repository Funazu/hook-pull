<?php

namespace App\Http\Controllers;

use App\Models\Hook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WebhookController extends Controller
{
    public function index()
    {
        return view('dashboard.webhook.index', [
            'title' => "Webhook",
            'active' => "webhook",
            'webhooks' => Hook::all()
        ])->with('i');
    }

    public function createWebhook(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'path' => 'required',
        ]);

        $validatedData['hash'] = base64_encode(Hash::make(uniqid()));
        $validatedData['commands'] = $request->commands;
        Hook::create($validatedData);
        return back()->with('successPost', "Successfully Created");
    }

    public function editWebhook(Request $request, Hook $hook)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'path' => 'required'
        ]);

        $validatedData['commands'] = $request->commands;
        $hook->update($validatedData);
        return back()->with('successEdit', "Successfully Updated");
    }

    public function deleteWebhook(Hook $hook)
    {
        $hook->delete();
        return back()->with('successDelete', "Successfully Deleted");
    }
}
