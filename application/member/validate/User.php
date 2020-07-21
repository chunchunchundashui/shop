<?php
namespace app\member\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:25|min:4|unique:user',
        'password' => 'require|max:25|min:6',
        'confirm_password' => 'require|confirm:password',
        'send_code' => 'length:6|number',
        'mobile_code' => 'length:6|number',
        'mobile_phone' => 'length:11|number|unique:user',
        'mobileagreement' => 'accepted',
        'register_type' => 'require|in:0,1',
        'email' =>  'email|unique:user',
    ];

    protected $message = [
        'username.require'  =>  '用户名必须',
        'username.max'  =>  '用户名过长',
        'username.min'  =>  '用户名过短',
        'username.unique'  =>  '用户名重复',
        'password.require'  =>  '密码必须',
        'password.max'  =>  '密码过长',
        'password.min'  =>  '密码过短',
        'confirm_password.require'  =>  '新密码必须',
        'confirm_password.confirm'  =>  '新密码和旧密码不一样',
        'send_code.length'  =>  '邮箱验证码必须为数字',
        'send_code.number'  =>  '邮箱验证码长度不正确',
        'mobile_code.length'  =>  '短信验证码必须为数字',
        'mobile_code.number'  =>  '短信验证码长度不正确',
        'mobile_phone.length'  =>  '手机号长度不正确',
        'mobile_phone.number'  =>  '手机号必须为数字',
        'mobile_phone.unique'  =>  '手机号必须唯一',
        'mobileagreement.accepted'  =>  '请勾选许可协议',
        'register_type.require'  =>  '未选择验证类型',
        'register_type.in'  =>  '验证类型错误',
        'email.email' =>  '邮箱格式错误',
        'email.unique' =>  '邮箱重复',
    ];

}