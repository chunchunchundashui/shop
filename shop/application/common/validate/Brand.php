<?php
namespace app\common\validate;

use think\Validate;

class Brand extends Validate
{
    protected $rule =   [
        'brand_name'  => 'require|unique:brand',
        'brand_url'   => 'url',
        'brand_description' => 'min:10',
    ];

    protected $message  =   [
        'brand_name.require' => '名称不能为空',
        'brand_name.unique'     => '名称不能重复',
        'brand_url.url'   => 'url格式不正确',
        'brand_description.min'  => '描述最少10个字符',
    ];

}
