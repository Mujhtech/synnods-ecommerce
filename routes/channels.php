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

Broadcast::channel('NewProduct', function(){
    return true;
});

Broadcast::channel('NewOrder', function(){
    return true;
});

Broadcast::channel('NewUser', function(){
    return true;
});
