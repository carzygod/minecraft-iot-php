<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unsigned()->default(1)->comment('买放ID');
            //🔥价格相关
            $table->integer('fee')->unsigned()->default(1)->comment('该笔订单价格');
            $table->integer('discount')->unsigned()->default(1)->comment('该笔订单折扣');
            $table->integer('finalFee')->unsigned()->default(1)->comment('该笔订单最终价格');
            $table->integer('realPay')->unsigned()->default(1)->comment('该笔订单真实支付的价格');
            //🔥订单相关
            $table->string('orderSn')->nullable()->default('null')->comment('订单号');
            $table->string('out_trade_no')->nullable()->default('null')->comment('订单流水号');
            $table->string('orderNum')->nullable()->default('null')->comment('微信订单号');
            $table->integer('status')->unsigned()->default(0)->comment('订单状态 0:未付款 1:付款成功待发货 2.发货成功待收货 3:确认收货成功待评价 4:评价成功 5:退款申请待退款 6:退款申请成功');
            
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
