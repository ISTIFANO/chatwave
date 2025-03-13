<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});



Broadcast::channel('chat.{user_id}', function ($user, $user_id) {
    return (int) $user->id === (int) $user_id;
});
Broadcast::channel('typing.{user_id}', function ($user, $user_id) {
    return true;
});