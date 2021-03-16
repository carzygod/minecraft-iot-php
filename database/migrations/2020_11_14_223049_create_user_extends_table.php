<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExtendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extends', function (Blueprint $table) {
            $table->id();
            $table->integer('shopId')->unsigned()->default(0)->comment('商城ID');
            $table->integer('fid')->unsigned()->default(0)->comment('父id');
            $table->text('uname')->nullable()->comment('指向用户名称');
            $table->text('uid')->nullable()->comment('用户unionid/openid登');
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
        Schema::dropIfExists('user_extends');
    }
}
