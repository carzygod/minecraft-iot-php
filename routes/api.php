<?php

use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Anonymous\AuthController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController as ConsumerUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * ๐ๅฟๅๆฅๅฃ
 */
Route::group([
    'namespace' => 'Anonymous'
], static function (Router $router) {
    /**
     * ๐ฅ็จๆท็ปๅฝๆฅๅฃ
     */
    $router->post('auth/login', "\\" . AuthController::class . '@login')->name('login');
    $router->post('auth/unCheckReg', "\\" . AuthController::class . '@unCheckReg');
    $router->any('auth/unCheckLogin', "\\" . AuthController::class . '@unCheckLogin');
    //็ปๅฝ
    $router->post('wechat/info', "\\" . AuthController::class . '@wxInfo');
    $router->post('wechat/login', "\\" . AuthController::class . '@wxLogin');
    /**
     * ๐ฅๆ ๆ้ๆฅ็ๆฅๅฃ
     */
    //๐่ทๅ้ฆ้กต้กถ้จๅนฟๅๆ 
    $router->get('shop/bannerTop', "\\" . AuthController::class . '@bannerTop');
    //๐่ทๅๅ็ฑปๅนฟๅๆ 
    $router->get('shop/bannerCatalog', "\\" . AuthController::class . '@bannerCatalog');
    //๐่ทๅๆจ่ๅ็ฑป๏ผ้ฆ้กต๏ผ
    $router->get('shop/recommendCatalog', "\\" . AuthController::class . '@recommendCatalog');
    //๐่ทๅๆฐๅๅๅ๏ผ้ฆ้กต๏ผ
    $router->get('shop/hotNewShop', "\\" . AuthController::class . '@hotNewShop');
    //๐่ทๅ้ๆบๅๅๆจ่
    $router->get('shop/goodList', "\\" . AuthController::class . '@goodList');
    //๐่ทๅ็ญๆๅณ้ฎๅญ
    $router->get('shop/hotWord', "\\" . AuthController::class . '@hotWord');
    
    /**
     * ๐ฅๅๅ็ธๅณ
     */
    //๐ๆฅ่ฏขๅๅ
    $router->get('shop/goodFind', "\\" . AuthController::class . '@goodFind');
    //๐ๆฅ่ฏขๅ็ฑป
    $router->get('shop/catalogFind', "\\" . AuthController::class . '@catalogFind');
    //๐ๆฅ่ฏขๅๅ่ฏฆ็ปไฟกๆฏ
    $router->get('shop/goodDetails', "\\" . AuthController::class . '@goodDetails');
    //๐ๆฅ่ฏขๅ็ๆฅๅฃ
    $router->get('shop/brandList', "\\" . AuthController::class . '@brandList');
    /**
     * ๐ฅๅพฎไฟกๅ่ฐ
     */
    
    $router->any('wechat/wxReturn', "\\" . AuthController::class . '@wxReturn');
    /**
     * ๐ฅDebug
     */
    $router->post('wechat/wxGetinfo', "\\" . AuthController::class . '@wxGetInfo');
    $router->get('fake/fakedata', "\\" . AuthController::class . '@fakeData');
    $router->get('fake/findItem', "\\" . AuthController::class . '@findItem');
    $router->post('fake/newItem', "\\" . AuthController::class . '@newItem');
    $router->post('fake/updateItem', "\\" . AuthController::class . '@newItem');
});

/**
 * ๐็จๆทๆฅๅฃ
 */
Route::group([
    'prefix' => 'user',
    'middleware' => ['auth:sanctum', 'role:User'],
    'namespace' => 'User'
], static function (Router $router) {
    // ็จๆทๆฅๅฃ
    $router->get('user/info', "\\" . ConsumerUserController::class . '@info');
    //๐ๅๅ่ฏฆๆๆฅ่ฏข๏ผ่ถณ่ฟน๏ผ
    $router->get('goodDetails', "\\" . ConsumerUserController::class . '@goodDetails');
    //๐ๆฅ็่ดญ็ฉ่ฝฆ
    $router->get('getCart', "\\" . ConsumerUserController::class . '@getCart');
    //๐ๆทปๅ ่ดญ็ฉ่ฝฆ
    $router->post('addCart', "\\" . ConsumerUserController::class . '@addCart');
    //๐ๅ ้ค่ดญ็ฉ่ฝฆ
    $router->post('killCart', "\\" . ConsumerUserController::class . '@killCart');
    //๐็ผ่พ่ดญ็ฉ่ฝฆ
    $router->post('editCart', "\\" . ConsumerUserController::class . '@editCart');
    //๐ๆฐๅข่ฎขๅ
    $router->post('newOrder', "\\" . ConsumerUserController::class . '@newOrder');
    //๐ๆฐๅข่ฎขๅ
    $router->get('listOrder', "\\" . ConsumerUserController::class . '@listOrder');
    //๐็จๆทๆฅ่ฏข่ฎขๅ่ฏฆๆ
    $router->get('getOrder', "\\" . ConsumerUserController::class . '@getOrder');
    //๐่ฎขๅ็กฎ่ฎคๅฐ่ดงใ้ๆฌพใๅๆถ่ดญไนฐ็ปๆไฝ
    $router->post('changeOrder', "\\" . ConsumerUserController::class . '@changeOrder');
    //๐ๆฅ็ๆถ่ๅคน
    $router->get('getLike', "\\" . ConsumerUserController::class . '@getLike');
    //๐ๆทปๅ ๆถ่ๅคน
    $router->post('addLike', "\\" . ConsumerUserController::class . '@addLike');
    //๐ๅ ้คๆถ่ๅคน
    $router->post('killLike', "\\" . ConsumerUserController::class . '@killLike');
    //๐ๅ ้คๆต่งๅๅฒ
    $router->post('killHistory', "\\" . ConsumerUserController::class . '@killHistory');
    //๐ๆฐๅข่ฎขๅ
    /**
     * ๐ฅ็จๆทไฟกๆฏ่ทๅ็ฑปๅๆฅๅฃ
     */
    //๐่ทๅ็จๆท่ฏฆๆ
    $router->get('getInfo', "\\" . ConsumerUserController::class . '@getInfo');
    //๐่ทๅ็จๆทๅฐๅ
    $router->get('getAddress', "\\" . ConsumerUserController::class . '@getAddress');
    //๐็ผ่พ็จๆทๅฐๅ
    $router->post('editAddress', "\\" . ConsumerUserController::class . '@editAddress');
    //๐ๆฐๅข็จๆทๅฐๅ
    $router->post('addAddress', "\\" . ConsumerUserController::class . '@addAddress');
    //๐่ทๅ็จๆทๆต่งๅๅฒ
    $router->get('getHistory', "\\" . ConsumerUserController::class . '@getHistory');
    
});

/**
 * ๐Adminๆฅๅฃ
 */
Route::group([
    'prefix' => 'Admin',
    'middleware' => ['auth:sanctum', 'role:Merchants'],
    'namespace' => 'Admin'
], static function (Router $router) {
    // ็จๆทๆฅๅฃ
    $router->get('/debug', "\\" . Merchants::class . '@debug');
});




