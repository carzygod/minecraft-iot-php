<?php
namespace App\Http\Controllers\Anonymous;
use App\Http\Controllers\Controller;
/**model
 * 🔥引用的model
 */
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\user_extend;

use App\Models\PoolExtend;
use App\Models\PoolItem;
use App\Models\pool;
//model
use App\Notifications\VerificationCode;
use App\Rules\PhoneRule;
use App\Rules\VerificationCodeRule;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Leonis\Notifications\EasySms\Channels\EasySmsChannel;
use Overtrue\EasySms\PhoneNumber;
use EasyWeChat\Factory;
use Pay;

class AuthController extends Controller
{

    private $shopId;

    public function __construct(Request $request) {
        $shopId = $request->header('shopId');
        $this->shopId = $shopId;
    }
 
    public function wxSetting(){
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
        return $config;
    }
    /**
     * 登录接口
     */

    /**
     * 通用登陆接口
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->toArray(), [
            'type' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        if ($request->input('type') === 'PASSWORD') {
            return $this->loginByPassword($request);
        }

        if ($request->input('type') === 'VERIFICATION_CODE') {
            return $this->loginByVerificationCode($request);
        }

        return $this->forbidden('登陆类型不匹配');
    }

    /**
     * 密码登陆方式
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    protected function loginByPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->toArray(), [
            'email' => ['sometimes', 'email'],
            'phone' => ['sometimes', new PhoneRule()],
            'name' => ['sometimes', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        $user = new User();

        if (!empty($request->input('email'))) {
            $user = $user->where('email', $request->input('email'))->first();
        } else if (!empty($request->input('phone'))) {
            $user = $user->where('phone', $request->input('phone'))->first();
        } else if (!empty($request->input('name'))) {
            $user = $user->where('name', $request->input('name'))->first();
        } else {
            return $this->forbidden('请输入邮箱或手机号码');
        }

        if (empty($user)) {
            $user = new User();
            $user->phone = $request->input('phone');
            $user->name = $request->input('name') ?? ('用户' . Str::random(6));
            $user->password = Hash::make($request->input('password'));
            $user->email = $request->input('email') ?? (Str::random(6) . '@' . config('app.domain'));
            empty($request->input('phone')) ?: $user->phone_verified_at = Carbon::now();
            $user->status = 0;

            $user->save();

            $user->assignRole('User');
        } else if (!Hash::check($request->input('password'), $user->password)) {
            return $this->unauthorized('登陆失败');
        }

        // 通过认证
        $token = $user->createToken('token');

        // 角色
        $role = $user->getRoleNames()->contains('Business') ? 'Business' : 'Consumer';

        return $this->success(['role' => $role, 'token' => $token->plainTextToken]);
    }

    /**
     * 验证码登陆方式
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function loginByVerificationCode(Request $request): JsonResponse
    {
        $validator = Validator::make($request->toArray(), [
            'phone' => ['required', new PhoneRule()],
            'verification_code' => ['required', 'numeric', new VerificationCodeRule($request->input('phone'))],
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        $user = new User();
        $user = $user->where('phone', $request->input('phone'))->first();

        if (empty($user)) {
            $user = new User();
            $user->phone = $request->input('phone');
            $user->name = '用户' . Str::random(6);
            $user->password = Hash::make(Str::random(32));
            $user->email = Str::random(6) . '@' . config('app.domain');
            $user->phone_verified_at = Carbon::now();
            $user->status = 0;

            $user->save();

            $user->assignRole('User');
        }

        $token = $user->createToken('token');

        // 角色
        $role = $user->getRoleNames()->contains('Business') ? 'Business' : 'Consumer';

        return $this->success(['role' => $role, 'token' => $token->plainTextToken]);
    }

    /**
     * 重置密码
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function resetPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->toArray(), [
            'phone' => ['required', new PhoneRule()],
            'password' => ['required', 'string', 'min:6'],
            'verification_code' => ['required', 'numeric', new VerificationCodeRule($request->input('phone'))],
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        $user = new User();
        $user = $user->where('phone', $request->input('phone'))->first() ?? new User();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $token = $user->createToken('token');

        // 角色
        $role = $user->getRoleNames()->contains('Business') ? 'Business' : 'Consumer';

        return $this->success(['role' => $role, 'token' => $token->plainTextToken]);
    }

    /**
     * 发送手机验证码
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function verificationCodeSend(Request $request): JsonResponse
    {
        $validator = Validator::make($request->toArray(), [
            'phone' => ['required', new PhoneRule()]
        ]);

        if ($validator->fails()) {
            return $this->setData($validator->errors())->forbidden();
        }

        $phone = $request->input('phone'); //手机号码

        $user = new User();
        try {
            $code = $user->saveVerificationCode($phone);
        } catch (Exception $e) {
            return $this->failed($e->getMessage());
        }

        Notification::route(
            EasySmsChannel::class,
            new PhoneNumber($phone, 86)
        )->notify(new VerificationCode($code));

        return $this->success('发送成功');
    }

    /**
     * 免密注册
     */
    public function unCheckReg(Request $request): JsonResponse{
        $user = new User();
        $user->phone = Str::random(1).Carbon::now()->getPreciseTimestamp(1);;
        $user->name = 'u' . Str::random(5).Carbon::now()->getPreciseTimestamp(3);;
        $user->password = Hash::make(Str::random(10));
        $user->email = Str::random(5) .Carbon::now()->getPreciseTimestamp(3). '@' . config('app.domain');
        $user->status = 0;
        $user->level = 0;
        $user->head='head';
        $user->nickname='nickname';
        $user->save();
        $user->assignRole('User');
        
        return $this->success($user->name);
    }

    /**
     * 免密登录(用户名)
     */
    public function unCheckLogin(Request $request): JsonResponse{
        $user = new User();
        $user = $user->where('name', $request->input('name'))->first();
                // 通过认证
                $token = $user->createToken('token');
                // 角色
                $role = $user->getRoleNames();
                return $this->success(['role' => $role, 'token' => $token->plainTextToken]);
    }

    /**
     * 🔥微信用户注册
     */
    public function wxInfo(Request $request): JsonResponse{
        $se=$request->input('se');
        $iv=$request->input('iv');
        $ed=$request->input('ed');
        $app = Factory::miniProgram(AuthController::wxSetting());
        $decryptedData = $app->encryptor->decryptData($se, $iv, $ed);
        if(empty($decryptedData['openId'])){//判断解密是否成功
            return $this->failed($decryptedData);
        }
        $username='u' . Str::random(5).Carbon::now()->getPreciseTimestamp(3);
        $user = new User();
        $user->phone = Str::random(5).Carbon::now()->getPreciseTimestamp(3);
        $user->name = $username;
        $user->password = Hash::make(Str::random(10));
        $user->email = Str::random(5) .Carbon::now()->getPreciseTimestamp(3). '@' . config('app.domain');
        $user->status = 0;
        $user->level = 0;
        $user->nickname= $decryptedData['nickName'];
        $user->head = $decryptedData['avatarUrl'];
        $user->save();
        $user->assignRole('User');
        
        //新建关联
        $user_extend=new user_extend();
        $user_extend->uname=$username;
        $user_extend->uid=$decryptedData['openId'];
        $user_extend->fid=0;
        $user_extend->save();

        //return $this->success($decryptedData);
        $token = $user->createToken('token');
        // 角色
        $role = $user->getRoleNames();
        $head=$user->head;
        $nickname=$user->nickname;
        return $this->success(['role' => $role, 'token' => $token->plainTextToken,'head'=>$head,'nickname'=>$nickname]);
    }

    /**
     * 🔥微信用户登录
     */
    public function wxLogin(Request $request): JsonResponse{
        $app = Factory::miniProgram(AuthController::wxSetting());
        $info=$app->auth->session($request->input('code'));
        $user_extend=new user_extend();
        if(empty($info['openid'])){
            return $this->failed($info);
        }else{
            $user_extend=$user_extend->where('uid',$info['openid'])->first();
        }
       
        if(empty($user_extend)){
            //提示注册
            return $this->failed($info);
        }else{
            //登录
            $user=User::where('name',$user_extend->uname)->first();
            $token = $user->createToken('token');
            $role = $user->getRoleNames();
            $head=$user->head;
            $nickname=$user->nickname;
            return $this->success(['role' => $role, 'token' => $token->plainTextToken,'head'=>$head,'nickname'=>$nickname]);
        }

    }

    public function wxGetInfo(Request $request): JsonResponse{

        $iv=$request->input('iv');
        $ed=$request->input('ed');
        $se=$request->input('se');
        $decryptedData = $app->encryptor->decryptData($se, $iv, $ed);
        if(true){//判断解密是否成功
            return $this->success($decryptedData);
        }
    }

    /**
     * 🔥非权限接口
     */
    public function bannerTop(Request $request): JsonResponse{
        /**
         * 🚀获取首页顶部广告栏
         */
        $banner=new Banner();
        $imgs=new Imgs();
        $banner=$banner->where('type','1')->get();
        for($i=0;$i<count($banner);$i++){
            $imgs=$imgs->find($banner[$i]->mid);
            $banner[$i]->url=$imgs->imgSrc;
        }
    return  $this->success($banner);

    }

    public function fakeData(){
         $item=new PoolItem();
         $item=$item->get();
         //🔥解码
         $data=array();
         for($i=0;$i<count($item);$i++){
             $tmp=$item[$i]->panel;
             $de=json_decode($tmp);
             $data[]=$de;
         }

        return  $this->success($data);
    }
    public function findItem(Request $request): JsonResponse{
        $token=$request->input('token');
        $item=new PoolItem();
        $item=$item->where('token',$token)->get();
         //🔥解码
         $data=array();
         for($i=0;$i<count($item);$i++){
             $tmp=$item[$i]->panel;
             $de=json_decode($tmp);
             $data[]=$de;
         }
        return  $this->success($data);
    }
    public function updateItem(Request $request): JsonResponse{
        $token=$request->input('token');
        $panel=$request->input('panel');
        $panel=json_encode($panel);
        $item=new PoolItem();
        $item=$item->where('token',$token)->first();
       // dd($item);
        if(empty($item)){
            return  $this->success("不存在该数据");
        }else{
            $item->panel=$panel;
            $item->save();
        }
        
        $item=new PoolItem();
        $item=$item->get();
        //🔥解码
        $data=array();
        for($i=0;$i<count($item);$i++){
            $tmp=$item[$i]->panel;
            $de=json_decode($tmp);
            $data[]=$de;
        }
        return  $this->success($data);
    }

    public function newItem(Request $request): JsonResponse{

        $token=$request->input('token');
        $panel=$request->input('panel');
        $item=new PoolItem();
        $item->token=$token;
        $item->panel=$panel;
        $item->save();

        $item=new PoolItem();
        $item=$item->get();
        //🔥解码
        $data=array();
        for($i=0;$i<count($item);$i++){
            $tmp=$item[$i]->panel;
            $de=json_decode($tmp);
            $data[]=$de;
        }
        return  $this->success($data);
    }


}
