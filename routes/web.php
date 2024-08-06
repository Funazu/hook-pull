<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProcessesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TerminalPermisController;
use App\Http\Controllers\User\TerminalController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function() {
    return redirect()->route('login');
});

Route::get('/status/{status:id_status}', [StatusController::class, 'status']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');

Route::middleware('is_admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/webhook', [WebhookController::class, 'index'])->name('webhook');
    Route::post('/dashboard/webhook/create', [WebhookController::class, 'createWebhook']);
    Route::put('/dashboard/webhook/edit/{hook:id}', [WebhookController::class, 'editWebhook']);
    Route::post('/dashboard/webhook/delete/{hook:id}', [WebhookController::class, 'deleteWebhook']);

    Route::get('/dashboard/log', [LogController::class, 'index'])->name('log');

    Route::get('/dashboard/public-status', [StatusController::class, 'index'])->name('public-status');
    Route::post('/dashboard/public-status/create', [StatusController::class, 'post']);
    Route::post('/dashboard/public-status/delete/{status:id_status}', [StatusController::class, 'delete']);

    Route::get('/dashboard/terminal-permission', [TerminalPermisController::class, 'index'])->name('terminal.permission');
    Route::post('/dashboard/terminal-permission/create', [TerminalPermisController::class, 'post']);
    Route::post('/dashboard/terminal-permission/delete/{terminalpermission:id_terminal_permission}', [TerminalPermisController::class, 'delete']);

    
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/terminal', [TerminalController::class, 'index'])->name('terminal');
    Route::get('/dashboard/terminal/{terminalpermission:id_terminal_permission}', [TerminalController::class, 'terminal']);
    Route::post('/terminal-execute/{terminalpermission:id_terminal_permission}', [TerminalController::class, 'execute']);

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/auth/account/changepassword/{user:id}', [DashboardController::class, 'changePassword'])->name('changePassword');

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
