<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method where(string $string, ...$input)
 * @property mixed|string name
 * @property mixed|string password
 * @property mixed|string email
 * @property int|mixed    status
 * @property mixed        phone
 * @property Carbon|mixed phone_verified_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *3
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 保存验证码
     *
     * @param int $phone
     * @param int $length 验证码长度
     *
     * @return int
     * @throws Exception
     */
    public function saveVerificationCode(int $phone, $length = 6): int
    {
        $cachePrefix = config('verification.prefix'); //缓存前缀

        $code = Cache::get($cachePrefix . $phone); //从缓存读取验证码

        if (!empty($code)) {
            return $code;
        }

        for ($i = 0; $i < $length; $i++) {
            if ($i === 0) {
                $code = random_int(1, 9);
            } else {
                $code .= random_int(0, 9);
            }
        }

        $code = (int)($code);

        Cache::put($cachePrefix . $phone, $code, config('verification.valid_time')); //缓存验证码至数据库

        return $code;
    }
}
