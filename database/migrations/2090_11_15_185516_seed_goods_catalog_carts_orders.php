<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use App\Models\Good;
// use App\Models\GoodType;
// use App\Models\Catalog;
// use App\Models\Order;
// use App\Models\OrderGood;
// use App\Models\Cart;
// use App\Models\Imgs;
// use App\Models\GoodImgs;
// use App\Models\Banner;
// use App\Models\History;
// use App\Models\Like;
// use App\Models\Msg;
// use App\Models\Brand;
// use App\Models\BrandExtend;
// use App\Models\HotSearch;
// use App\Models\UserSellerLink;
// use App\Models\Address;

//工具
use Illuminate\Support\Str;

class SeedGoodsCatalogCartsOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // //图片
        // $imgs=new Imgs();
        // $imgs->type=0;
        // $imgs->imgSrc = 'https://jsp.sidcloud.cn/source/images/mall/banner/5.jpg';
        // $imgs->save();

        // $imgs=new Imgs();
        // $imgs->type=0;
        // $imgs->imgSrc = 'https://jsp.sidcloud.cn/source/images/mall/banner/4.jpg';
        // $imgs->save();

        // $imgs=new Imgs();
        // $imgs->type=0;
        // $imgs->imgSrc = 'https://jsp.sidcloud.cn/source/images/mall/banner/3.jpg';
        // $imgs->save();

        // $imgs=new Imgs();
        // $imgs->type=0;
        // $imgs->imgSrc = 'https://jsp.sidcloud.cn/source/images/mall/banner/2.jpg';
        // $imgs->save();

        // $imgs=new Imgs();
        // $imgs->type=0;
        // $imgs->imgSrc = 'https://jsp.sidcloud.cn/source/images/mall/banner/1.jpg';
        // $imgs->save();
        // //目录
        // $catalogs=new Catalog();
        // $catalogs->name='测试分类1';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='手机';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='飞机杯';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='测试分类2';
        // $catalogs->fid=1;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/1.jpg';
        // $catalogs->save();
        
        // $catalogs=new Catalog();
        // $catalogs->name='测试分类3';
        // $catalogs->fid=1;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/2.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='测试分类4';
        // $catalogs->fid=1;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/3.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='测试分类5';
        // $catalogs->fid=1;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/4.png';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='iPhone';
        // $catalogs->fid=2;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/5.png';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='三星';
        // $catalogs->fid=2;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/6.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='苍井空';
        // $catalogs->fid=3;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/7.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='泷泽萝拉';
        // $catalogs->fid=3;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/8.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='小泽玛利亚';
        // $catalogs->fid=3;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/9.jpg';
        // $catalogs->save();

        // $catalogs=new Catalog();
        // $catalogs->name='憨憨前端';
        // $catalogs->fid=3;
        // $catalogs->icon='https://jsp.sidcloud.cn/source/images/mall/category/10.jpg';
        // $catalogs->save();

        // //商品
        // $goods=new Good();
        // $goods->name='商品1';
        // $goods->cid=4;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/1.jpg';
        // $goods->fee=199;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->oldfee=999;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=1;
        // $goodimg->iid=1;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='商品2';
        // $goods->cid=4;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/2.jpg';
        // $goods->fee=199;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->oldfee=999;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=2;
        // $goodimg->iid=2;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格2';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goodtype->save();
        
        // $goods=new Good();
        // $goods->name='商品3';
        // $goods->cid=4;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->fee=199;
        // $goods->oldfee=999;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=5;
        // $goodimg->iid=5;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/1.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格2';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/2.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格3';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/3.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='iPhone10';
        // $goods->cid=4;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/4.jpg';
        // $goods->fee=199;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=1;
        // $goodimg->iid=3;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='三成熟';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='生吃';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='不要肾要膀胱';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='iPhone12';
        // $goods->cid=5;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goods->fee=299;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=2;
        // $goodimg->iid=4;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='macosX';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/1.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='iPhone 250';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/2.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='精乔落泪';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='iPhone13';
        // $goods->cid=5;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goods->fee=399;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=1;
        // $goodimg->iid=4;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='左边的膀胱';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/1.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='没有膀胱的废物';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/4.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='阿玛尼小天才手表';
        // $goods->cid=6;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/1.jpg';
        // $goods->fee=499;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=4;
        // $goodimg->iid=4;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='黑色阿玛尼款';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goodtype->save();
        

        // $goods=new Good();
        // $goods->name='PS4港版';
        // $goods->cid=6;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/2.jpg';
        // $goods->fee=599;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->brand=2;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=4;
        // $goodimg->iid=1;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='女生自用';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='前男友送的';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/3.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='PS5港版';
        // $goods->cid=6;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/3.jpg';
        // $goods->fee=699;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->brand=2;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=4;
        // $goodimg->iid=2;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='XBOX360';
        // $goods->cid=7;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/4.jpg';
        // $goods->fee=99;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->brand=1;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=4;
        // $goodimg->iid=3;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='规格1';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/6.jpg';
        // $goodtype->save();

        // $goods=new Good();
        // $goods->name='前端社畜';
        // $goods->cid=7;
        // $goods->icon='https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goods->fee=99;
        // $goods->oldfee=999;
        // $goods->context=json_encode(array('https://jsp.sidcloud.cn/source/images/mall/category/10.jpg','https://jsp.sidcloud.cn/source/images/mall/category/2.jpg','https://jsp.sidcloud.cn/source/images/mall/category/1.jpg'));
        // $goods->brand=1;
        // $goods->save();
        // $goodimg=new GoodImgs();
        // $goodimg->gid=4;
        // $goodimg->iid=4;
        // $goodimg->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='接口谋杀者';
        // $goodtype->fee=168;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/5.jpg';
        // $goodtype->save();
        // $goodtype=new GoodType();
        // $goodtype->fid=$goods->id;
        // $goodtype->fname=$goods->name;
        // $goodtype->name='人见人爱的小♂可爱';
        // $goodtype->fee=198;
        // $goodtype->icon = 'https://jsp.sidcloud.cn/source/images/mall/product/2.jpg';
        // $goodtype->save();

        // //商品分类

        // //banner
        // $banner=new banner();
        // $banner->type=1;
        // $banner->mid=1;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=2;
        // $banner->mid=1;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=2;
        // $banner->mid=2;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=1;
        // $banner->mid=2;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=1;
        // $banner->mid=3;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=2;
        // $banner->mid=3;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=6;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=5;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=4;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=6;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=12;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=11;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=10;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=9;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=8;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=3;
        // $banner->mid=7;
        // $banner->is_showed=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=1;
        // $banner->is_showed=1;
        // $banner->value=1;
        // $banner->save();
        
        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=3;
        // $banner->is_showed=1;
        // $banner->value=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=2;
        // $banner->is_showed=1;
        // $banner->value=1;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=4;
        // $banner->is_showed=1;
        // $banner->value=2;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=5;
        // $banner->is_showed=1;
        // $banner->value=2;
        // $banner->save();

        // $banner=new banner();
        // $banner->type=4;
        // $banner->mid=6;
        // $banner->is_showed=1;
        // $banner->value=1;
        // $banner->save();


        // //浏览历史
        // $history=new History();
        // $history->gid=1;
        // $history->uid=1;
        // $history->save();

        // $history=new History();
        // $history->gid=2;
        // $history->uid=1;
        // $history->save();

        // $history=new History();
        // $history->gid=4;
        // $history->uid=1;
        // $history->save();

        // $history=new History();
        // $history->gid=3;
        // $history->uid=1;
        // $history->save();
        // //收藏夹
        // $like=new Like();
        // $like->gid=1;
        // $like->uid=1;
        // $like->save();
        
        // $like=new Like();
        // $like->gid=2;
        // $like->uid=1;
        // $like->save();

        // $like=new Like();
        // $like->gid=3;
        // $like->uid=1;
        // $like->save();

        // $like=new Like();
        // $like->gid=4;
        // $like->uid=1;
        // $like->save();

        // $like=new Like();
        // $like->gid=5;
        // $like->uid=1;
        // $like->save();

        // //订单
        // $order = new Order();
        // $order->uid=1;
        // $order->fee=199;
        // $order->status=0;
        // $order->orderSn=Str::random(16);
        // $order->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=1;
        // $ordergood->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=2;
        // $ordergood->save();

        // $order = new Order();
        // $order->uid=1;
        // $order->fee=199;
        // $order->status=1;
        // $order->orderSn=Str::random(16);
        // $order->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=2;
        // $ordergood->save();

        // $order = new Order();
        // $order->uid=1;
        // $order->fee=199;
        // $order->status=1;
        // $order->orderSn=Str::random(16);
        // $order->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=3;
        // $ordergood->save();

        // $order = new Order();
        // $order->uid=1;
        // $order->fee=199;
        // $order->status=3;
        // $order->orderSn=Str::random(16);
        // $order->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=1;
        // $ordergood->save();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=2;
        // $order->orderSn=Str::random(16);
        // $ordergood->save();

        // $order = new Order();
        // $order->uid=1;
        // $order->fee=199;
        // $order->status=4;
        // $order->orderSn=Str::random(16);
        // $order->save();
        // $ordergood=new OrderGood();
        // $ordergood->oid=$order->id;
        // $ordergood->tid=3;
        // $ordergood->save();

        // //留言
        // $msg=new Msg();
        // $msg->oid=6;
        // $msg->gid=1;
        // $msg->msg='这个是天才发明啊！！！';
        // $msg->status=3;
        // $msg->save();

        // $msg=new Msg();
        // $msg->oid=1;
        // $msg->gid=1;
        // $msg->msg='天才啊啊啊啊！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=2;
        // $msg->gid=2;
        // $msg->msg='这个是天才发明啊！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=3;
        // $msg->gid=3;
        // $msg->msg='这个是天才发明啊！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=4;
        // $msg->gid=4;
        // $msg->msg='这个是天才发明啊！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=5;
        // $msg->gid=1;
        // $msg->msg='cnmb123！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=7;
        // $msg->gid=3;
        // $msg->msg='别天才了！！！';
        // $msg->status=3;
        // $msg->save();


        // $msg=new Msg();
        // $msg->oid=8;
        // $msg->gid=4;
        // $msg->msg='GUN！！！';
        // $msg->status=3;
        // $msg->save();


        // //品牌
        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='索尼';
        // $brand->cid=1;
        // $brand->type=1;
        // $brand->icon='https://jsp.sidcloud.cn/source/images/brand/sony.jpg';
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=2;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=3;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=4;
        // $brandex->save();

        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='东芝';
        // $brand->cid=1;
        // $brand->type=1;
        // $brand->icon='https://jsp.sidcloud.cn/source/images/brand/dongzhi.jpg';
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=1;
        // $brandex->save();

        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='爱立信';
        // $brand->cid=2;
        // $brand->type=1;
        // $brand->icon='https://jsp.sidcloud.cn/source/images/brand/ailixin.jpg';
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=1;
        // $brandex->save();

        // //分类分层
        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='集合1';
        // $brand->cid=1;
        // $brand->type=2;
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=5;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=6;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=7;
        // $brandex->save();
        
        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='集合2';
        // $brand->cid=1;
        // $brand->type=2;
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=5;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=6;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=7;
        // $brandex->save();


        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='分类2的集合1';
        // $brand->cid=1;
        // $brand->type=2;
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=5;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=6;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=7;
        // $brandex->save();
        
        // $brand=new Brand();
        // $brand->shopId=1;
        // $brand->name='分类2的集合2';
        // $brand->cid=1;
        // $brand->type=2;
        // $brand->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=5;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=6;
        // $brandex->save();
        // $brandex=new BrandExtend();
        // $brandex->bid=$brand->id;
        // $brandex->value=7;
        // $brandex->save();
        
        // //热搜
        // $hotsearch=new HotSearch();
        // $hotsearch->value='飞机杯';
        // $hotsearch->save();

        // $hotsearch=new HotSearch();
        // $hotsearch->value='仙女快乐棒';
        // $hotsearch->save();

        // $hotsearch=new HotSearch();
        // $hotsearch->value='iPhone';
        // $hotsearch->save();

        // $hotsearch=new HotSearch();
        // $hotsearch->value='扶她飞机杯';
        // $hotsearch->save();

        // $hotsearch=new HotSearch();
        // $hotsearch->value='任劳任怨的前端';
        // $hotsearch->save();

        // $hotsearch=new HotSearch();
        // $hotsearch->value='接班人';
        // $hotsearch->isShowed=0;
        // $hotsearch->save();

        // //用户mid
        // $link=new UserSellerLink();
        // $link->shopId=1;
        // $link->uid=1;
        // $link->mid=2;

        // $link=new UserSellerLink();
        // $link->shopId=2;
        // $link->uid=1;
        // $link->mid=3;

        // $link=new UserSellerLink();
        // $link->shopId=1;
        // $link->uid=1;
        // $link->mid=4;
        
        // //地址
        // $address =new Address();
        // $address->uid=1;
        // $address->name='天才！';
        // $address->pho='110';
        // $address->place='朝阳派出所';
        // $address->setting='测试数据';
        // $address->is_default=0;
        // $address->save();

        // $address =new Address();
        // $address->uid=1;
        // $address->name='吴国黎';
        // $address->pho='17367109416';
        // $address->place='广东珠海';
        // $address->setting='测试数据nmd';
        // $address->is_default=0;
        // $address->save();

        // $address =new Address();
        // $address->uid=1;
        // $address->name='金其涵';
        // $address->pho='15916211577';
        // $address->place='朝阳看守所';
        // $address->setting='测试数据wdnmd';
        // $address->is_default=0;
        // $address->save();

        // $address =new Address();
        // $address->uid=1;
        // $address->name='没错这是名字';
        // $address->pho='120';
        // $address->place='朝阳派出所';
        // $address->setting='测试数据';
        // $address->is_default=0;
        // $address->save();

        // $address =new Address();
        // $address->uid=1;
        // $address->name='头痛';
        // $address->pho='110';
        // $address->place='朝阳派出所';
        // $address->setting='测试数据';
        // $address->is_default=0;
        // $address->save();

        // $address =new Address();
        // $address->uid=1;
        // $address->name='困困';
        // $address->pho='110';
        // $address->place='朝阳派出所';
        // $address->setting='测试数据';
        // $address->is_default=1;
        // $address->save();

        // //购物车
        // $cart=new Cart();
        // $cart->sid=1;
        // $cart->mid=2;
        // $cart->uid=1;
        // $cart->gid=1;
        // $cart->tid=1;
        // $cart->num=4;
        // $cart->fee=200;
        // $cart->save();

        // $cart=new Cart();
        // $cart->sid=1;
        // $cart->mid=2;
        // $cart->uid=1;
        // $cart->gid=1;
        // $cart->tid=2;
        // $cart->num=2;
        // $cart->fee=100;
        // $cart->save();

        // $cart=new Cart();
        // $cart->sid=1;
        // $cart->mid=2;
        // $cart->uid=1;
        // $cart->gid=2;
        // $cart->tid=4;
        // $cart->num=9;
        // $cart->fee=1200;
        // $cart->save();

        // $cart=new Cart();
        // $cart->sid=1;
        // $cart->mid=2;
        // $cart->uid=1;
        // $cart->gid=3;
        // $cart->tid=5;
        // $cart->num=20;
        // $cart->fee=20000;
        // $cart->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
