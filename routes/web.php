<?php

use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();
Route::middleware('auth')->group(function (){

    Route::get("/users",[User::class,'index'])->name('users');
    Route::get("/online",[Message::class,'SetOnline'])->name('online');
    Route::get("/offline",[Message::class,'SetOffline'])->name('offline');
    Route::post("/chat/typing",[Message::class,'typing'])->name('typing');
    Route::post("/chat/{receiver_id}/send",[Message::class,'sendMessage'])->name('sendMessage');
    Route::get("/chat/{receiver_id}",[Message::class,'chat'])->name('messages');




});




