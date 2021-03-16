<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Rules\PhoneRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
/**model
 * 🔥引用的model
 */
use App\Models\user_extend;
use App\Models\Banner;
use App\Models\Good;
use App\Models\Order;
use App\Models\OrderSms;

//支付
use Pay;
use EasyWeChat\Factory;
//工具
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * 获取用户信息
     *
     * @param Request $request
     *
     * @return JsonResponse
     */

    public function __construct(Request $request) {
        $shopId = $request->header('shopId');
        $config = [
            'app_id' => 'wxd59ee69b93ef664c',
            'secret' => 'b098ad4c0ae5a4586c74242152541e03',
        
            // 下面为可选项
            // 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
            'response_type' => 'array',
        
            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];
        $this->wxConfig=$config;
        $this->shopId = $shopId;
    }

    public function info(Request $request): JsonResponse
    {
        $user = $request->user() ?? new User();
        $user->roles = $user->roles()->get();

        return $this->success($user);
    }

    /**
     * 用户资料修改
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'password' => ['sometimes', 'required', 'string', 'min:6'],
            'phone' => ['sometimes', 'required', 'unique:users', new PhoneRule()],
            'nickname' => ['sometimes', 'required', 'string', 'max:12', 'min:2'],
            'avatar' => ['sometimes', 'required', 'url',],
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        $user = Auth::user() ?? new User();
        $user->fill($request->all());
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        return $this->success($user->save());
    }


    /**
     * 
     * 🔥用户常用接口
     * 
     */

     /**
      * 🚀获取用户个人信息
      */
      public function getInfo(Request $request): JsonResponse
      {
        $u=new User();
        $order=new Order();

        $user = $request->user();
        $uid=$user->id;
        $tmpu=User::find($uid);
        $u->nickName=$tmpu->nickname;
        $u->head=$tmpu->head;
        //$u=$u->where('id',$uid)->get(['nickName','head']);
        $orderwhere=array();
        $orderwhere[]=array('uid',$uid);
        //order计数
        //订单状态 0:未付款 1:付款成功待发货 2.发货成功待收货 3:确认收货成功待评价 4:评价成功 5:退款申请待退款 6:退款申请成功
        $unpay=$orderwhere;
        $unpay[]=array('status',0);
        $unpay=$order->where($unpay)->get();

        $unsend=$orderwhere;
        $unsend[]=array('status',0);
        $unsende=$order->where($unsend)->get();

        $unrecive=$orderwhere;
        $unrecive[]=array('status',2);
        $unrecive=$order->where($unrecive)->get();

        $unmsg=$orderwhere;
        $unmsgg[]=array('status',3);
        $unmsg=$order->where($unmsg)->get();

        $end=$orderwhere;
        $end[]=array('status',4);
        $end=$order->where($end)->get();

        $unrefound=$orderwhere;
        $unrefound[]=array('status',4);
        $unrefound=$order->where($unrefound)->get();

        $refounded=$orderwhere;
        $refounded[]=array('status',4);
        $refounded=$order->where($refounded)->get();


        $u->order=array('unpay'=>count($unpay),'unsend'=>count($unsend),'unrecive'=>count($unrecive),'unmsg'=>count($unmsg),'end'=>count($end),'unrefound'=>count($unrefound),'refounded'=>count($refounded));
        return $this->success($u);
      }


}
