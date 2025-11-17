<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', [ChatController::class, 'index']);
Route::post('/messages', [ChatController::class, 'store'])->name('chat.store');


//Route::get('/', function () {
//    return view('welcome');
// });
