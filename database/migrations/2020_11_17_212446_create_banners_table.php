<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->integer('shopId')->unsigned()->default(0)->comment('归属商家');
            $table->integer('type')->unsigned()->nullable()->default(1)->comment('1:首页banner 2:分类banner 3:首页推荐分类 4:新品商品推荐 ');
            $table->integer('mid')->unsigned()->nullable()->default(1)->comment('图片id');
            $table->integer('is_showed')->unsigned()->nullable()->default(1)->comment('0：不显示 1：显示');
            $table->integer('value')->unsigned()->nullable()->default(3)->comment('新品商品分类的左上标 1.新品 2.打折 3.无');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
