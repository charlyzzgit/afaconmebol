<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('test.{user_id}', function ($user) {
    //$u = \App\Models\User::find($user_id);
    return $user ? $user->name : 'DESCONOCIDO';
});

Broadcast::channel('map', function ($latlng) {
    //dump($latlng);
    return ['latlng' => $latlng];
});


