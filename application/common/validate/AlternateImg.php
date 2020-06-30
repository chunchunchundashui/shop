<?php
namespace app\common\validate;

use think\Validate;

class AlternateImg extends Validate
{
    protected $rule =   [
        'title'  => 'require|unique:alternate_img',
        'img_src' => 'require'
    ];

    protected $message  =   [
        'title.require' => '名称不能为空',
        'title.unique'     => '名称不能重复',
        'img_src.require' => '图片不能为空'
    ];

}
