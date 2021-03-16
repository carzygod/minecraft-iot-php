<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PoolExtend;
use App\Models\PoolItem;
use App\Models\pool;
class SeedPoolUserOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //pool
        $pool=new Pool();
        $pool->token="wph002";
        $pool->save();

        $pool=new Pool();
        $pool->token="wph003";
        $pool->save();

        $pool=new Pool();
        $pool->token="wph005";
        $pool->save();

        $pool=new Pool();
        $pool->token="wph991";
        $pool->save();

        $pool=new Pool();
        $pool->token="wph992";
        $pool->save();
        //pool extend
        $extend=new PoolExtend();
        $extend->belong="wph991";
        $extend->to="wph992";
        $extend->save();

        $extend=new PoolExtend();
        $extend->belong="wph992";
        $extend->to="wph991";
        $extend->save();
        //paneldata

        $panel=new PoolItem();
        $panel->token="wph002";
        $card='{"card":{"id":1,"target":"wph002","level":1,"name":{"text":"ESP8266"}},"token":"wph002","item":[{"level":1,"name":"我的ESP8266","type":1,"key":"0","style":1,"value":"","token":"wph002001","data":{"value":"哈哈哈服务器"}},{"level":2,"name":"打开LED","type":2,"key":"0","style":1,"value":"","token":"wph002002","data":{"value":"on"}},{"level":3,"name":"关闭LED","type":2,"key":"0","style":2,"value":"","token":"wph002003","data":{"value":"off"}},{"level":4,"name":"闪一下","type":2,"key":"name","style":3,"value":"","token":"wph002004","data":{"value":"blink"}},{"level":1,"name":"WOL开机","type":2,"key":"name","style":1,"value":"","token":"wph002005","data":{"value":"wol"}}]}';
        $panel->panel=$card;
        $panel->save();

        $panel=new PoolItem();
        $panel->token="wph003";
        $card='{"card":{"id":1,"target":"wph003","level":1,"name":{"text":"我的聊天室"}},"token":"wph003","item":[{"level":1,"name":"聊天内容","type":1,"key":"0","style":1,"value":"","token":"wph003001","data":{"value":"哈哈哈服务器"}},{"level":2,"name":"","type":1,"key":"say","style":1,"value":"","token":"wph003002","data":{"value":"哈哈哈の服务器"}},{"level":3,"name":"发送Hello","type":2,"key":"name","style":1,"value":"","token":"wph003003","data":{"value":"Hello"}},{"level":4,"name":"发送cnm","type":2,"key":"name","style":2,"value":"","token":"wph003004","data":{"value":"cnm"}}]}';
        $panel->panel=$card;
        $panel->save();

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
