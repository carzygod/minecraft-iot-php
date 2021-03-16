<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use App\Http\Controllers\User\UserController as ConsumerUserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * 🔥用户可视网页
 */
Route::group([
    'prefix' => 'user',
    'middleware' => ['auth:sanctum', 'role:User'],
    'namespace' => 'User'
], static function (Router $router) {
    $router->get('excel',function () {
        return view('decode');
    });
});