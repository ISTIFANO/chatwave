<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/chat', function () {
    return view('chat.chat');
})->name('chat.chat');



