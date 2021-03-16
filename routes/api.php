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
 * 🚀匿名接口
 */
Route::group([
    'namespace' => 'Anonymous'
], static function (Router $router) {
    /**
     * 🔥用户登录接口
     */
    $router->post('auth/login', "\\" . AuthController::class . '@login')->name('login');
    $router->post('auth/unCheckReg', "\\" . AuthController::class . '@unCheckReg');
    $router->any('auth/unCheckLogin', "\\" . AuthController::class . '@unCheckLogin');
    //登录
    $router->post('wechat/info', "\\" . AuthController::class . '@wxInfo');
    $router->post('wechat/login', "\\" . AuthController::class . '@wxLogin');
    /**
     * 🔥无权限查看接口
     */
    //🚀获取首页顶部广告栏
    $router->get('shop/bannerTop', "\\" . AuthController::class . '@bannerTop');
    //🚀获取分类广告栏
    $router->get('shop/bannerCatalog', "\\" . AuthController::class . '@bannerCatalog');
    //🚀获取推荐分类（首页）
    $router->get('shop/recommendCatalog', "\\" . AuthController::class . '@recommendCatalog');
    //🚀获取新品商品（首页）
    $router->get('shop/hotNewShop', "\\" . AuthController::class . '@hotNewShop');
    //🚀获取随机商品推荐
    $router->get('shop/goodList', "\\" . AuthController::class . '@goodList');
    //🚀获取热搜关键字
    $router->get('shop/hotWord', "\\" . AuthController::class . '@hotWord');
    
    /**
     * 🔥商城相关
     */
    //🚀查询商品
    $router->get('shop/goodFind', "\\" . AuthController::class . '@goodFind');
    //🚀查询分类
    $router->get('shop/catalogFind', "\\" . AuthController::class . '@catalogFind');
    //🚀查询商品详细信息
    $router->get('shop/goodDetails', "\\" . AuthController::class . '@goodDetails');
    //🚀查询品牌接口
    $router->get('shop/brandList', "\\" . AuthController::class . '@brandList');
    /**
     * 🔥微信回调
     */
    
    $router->any('wechat/wxReturn', "\\" . AuthController::class . '@wxReturn');
    /**
     * 🔥Debug
     */
    $router->post('wechat/wxGetinfo', "\\" . AuthController::class . '@wxGetInfo');
    $router->get('fake/fakedata', "\\" . AuthController::class . '@fakeData');
    $router->get('fake/findItem', "\\" . AuthController::class . '@findItem');
    $router->post('fake/newItem', "\\" . AuthController::class . '@newItem');
    $router->post('fake/updateItem', "\\" . AuthController::class . '@newItem');
});

/**
 * 🚀用户接口
 */
Route::group([
    'prefix' => 'user',
    'middleware' => ['auth:sanctum', 'role:User'],
    'namespace' => 'User'
], static function (Router $router) {
    // 用户接口
    $router->get('user/info', "\\" . ConsumerUserController::class . '@info');
    //🚀商品详情查询（足迹）
    $router->get('goodDetails', "\\" . ConsumerUserController::class . '@goodDetails');
    //🚀查看购物车
    $router->get('getCart', "\\" . ConsumerUserController::class . '@getCart');
    //🚀添加购物车
    $router->post('addCart', "\\" . ConsumerUserController::class . '@addCart');
    //🚀删除购物车
    $router->post('killCart', "\\" . ConsumerUserController::class . '@killCart');
    //🚀编辑购物车
    $router->post('editCart', "\\" . ConsumerUserController::class . '@editCart');
    //🚀新增订单
    $router->post('newOrder', "\\" . ConsumerUserController::class . '@newOrder');
    //🚀新增订单
    $router->get('listOrder', "\\" . ConsumerUserController::class . '@listOrder');
    //🚀用户查询订单详情
    $router->get('getOrder', "\\" . ConsumerUserController::class . '@getOrder');
    //🚀订单确认到货、退款、取消购买登操作
    $router->post('changeOrder', "\\" . ConsumerUserController::class . '@changeOrder');
    //🚀查看收藏夹
    $router->get('getLike', "\\" . ConsumerUserController::class . '@getLike');
    //🚀添加收藏夹
    $router->post('addLike', "\\" . ConsumerUserController::class . '@addLike');
    //🚀删除收藏夹
    $router->post('killLike', "\\" . ConsumerUserController::class . '@killLike');
    //🚀删除浏览历史
    $router->post('killHistory', "\\" . ConsumerUserController::class . '@killHistory');
    //🚀新增订单
    /**
     * 🔥用户信息获取类型接口
     */
    //🚀获取用户详情
    $router->get('getInfo', "\\" . ConsumerUserController::class . '@getInfo');
    //🚀获取用户地址
    $router->get('getAddress', "\\" . ConsumerUserController::class . '@getAddress');
    //🚀编辑用户地址
    $router->post('editAddress', "\\" . ConsumerUserController::class . '@editAddress');
    //🚀新增用户地址
    $router->post('addAddress', "\\" . ConsumerUserController::class . '@addAddress');
    //🚀获取用户浏览历史
    $router->get('getHistory', "\\" . ConsumerUserController::class . '@getHistory');
    
});

/**
 * 🚀Admin接口
 */
Route::group([
    'prefix' => 'Admin',
    'middleware' => ['auth:sanctum', 'role:Merchants'],
    'namespace' => 'Admin'
], static function (Router $router) {
    // 用户接口
    $router->get('/debug', "\\" . Merchants::class . '@debug');
});




