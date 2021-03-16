<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\PhoneRule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * 获取用户信息
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
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
}
