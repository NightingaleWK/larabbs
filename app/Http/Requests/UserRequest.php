<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * 确定用户是否有权发出此请求
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * 验证规则方法
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
        ];
    }

    /**
     * 获取验证错误的自定义属性
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'introduction' => '个人简介',
        ];
    }
}
