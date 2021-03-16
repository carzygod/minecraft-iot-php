<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//操作记录表
class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('uid')->unsigned()->nullable()->default(12)->comment('操作者id');
            $table->string('action', 100)->nullable()->default('text')->comment('操作名称');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record');
    }
}
