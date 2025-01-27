<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

// Route::get('/send-email', function () {
//     Mail::to('to@example.com')->send(new TestEmail());
//     return 'Email sent!';
// })->middleware('email');

Route::get('/index', [EmailController::class, 'index'])->name('index');
Route::post('/send-email', [EmailController::class, 'send'])->name('send-email');