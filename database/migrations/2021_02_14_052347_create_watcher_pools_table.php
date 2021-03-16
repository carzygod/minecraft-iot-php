<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatcherPoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watcher_pools', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unsigned()->default(0)->comment('用户id');
            $table->text('websocketCode')->nullable()->comment('websocket的连接指向');
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
        Schema::dropIfExists('watcher_pools');
    }
}
