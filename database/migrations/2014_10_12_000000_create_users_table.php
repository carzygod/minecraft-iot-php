<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('level')->comment('用户等级/权限 🔥0:无权限 1:普通用户 2:管理员 3:商家 4:分销商家 ');
            $table->string('name');
            $table->string('email')->unique()->comment('邮箱');
            $table->string('phone')->nullable()->unique()->comment('手机号码');
            $table->string('relName')->nullable()->unique()->comment('真实姓名');
            $table->timestamp('email_verified_at')->nullable()->comment('邮箱验证时间');
            $table->timestamp('phone_verified_at')->nullable()->comment('手机号码验证时间');
            $table->string('password')->comment('登陆密码');
            $table->tinyInteger('status')->comment('用户状态');
            $table->string('head')->comment('头像');
            $table->string('nickname')->comment('昵称');
            $table->rememberToken();
            $table->timestamps();
           // $table->bigInteger('fee')->nullable()->default(12)->comment('账号可提现余额');
           //$table->string('payPassword', 100)->nullable()->default('text')->comment('支付密码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
