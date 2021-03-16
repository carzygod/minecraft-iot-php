<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class VerificationCodeRule implements Rule
{
    private $phone;

    /**
     * Create a new rule instance.
     *
     * @param int $phone
     *
     * @return void
     */
    public function __construct(int $phone)
    {
        $this->phone = $phone;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param mixed $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $cachePrefix = config('verification.prefix'); //缓存前缀

        $code = (int)Cache::get($cachePrefix . $this->phone);

        $result = $code === (int)$value;

        if ($result) {
            Cache::forget($cachePrefix . $this->phone);
        }

        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return '手机号或验证码错误';
    }
}
