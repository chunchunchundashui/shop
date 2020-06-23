<?php
namespace app\common\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule =   [
        'cate_name'  => 'require|unique:category|min:2',
        'pid' => 'require'
    ];

    protected $message  =   [
        'cate_name.require' => '分类名称不能为空',
        'cate_name.unique'     => '分类名称不能重复',
        'cate_name.min'     => '分类名称不能过短',
        'pid.require' => '上级分类不能为空',
    ];

}
