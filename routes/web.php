<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProcessesController;
use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/webhook', [WebhookController::class, 'index'])->name('webhook');
    Route::post('/dashboard/webhook/create', [WebhookController::class, 'createWebhook']);
    Route::put('/dashboard/webhook/edit/{hook:id}', [WebhookController::class, 'editWebhook']);
    Route::post('/dashboard/webhook/delete/{hook:id}', [WebhookController::class, 'deleteWebhook']);

    Route::get('/dashboard/log', [LogController::class, 'index'])->name('log');
});
