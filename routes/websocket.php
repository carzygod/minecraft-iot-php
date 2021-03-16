<?php


use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    // called while socket on connect
    echo("好耶！");
    $websocket->emit('message',"好耶！");
    
});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
    $websocket->emit('return',"不好！");
    echo("不好！");
});

Websocket::on('message', function ($websocket, $data) {
    echo("cnm");
    echo($data);
    $websocket->emit('message', $data);
});
