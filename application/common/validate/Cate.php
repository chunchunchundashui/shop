<?php
namespace app\common\validate;

use think\Validate;

class Cate extends Validate
{
    protected $rule =   [
        'cate_name'  => 'require|unique:cate|min:3',
    ];

    protected $message  =   [
        'cate_name.require' => '分类名称不能为空',
        'cate_name.unique'     => '分类名称不能重复',
        'cate_name.min'     => '栏目名称不能过短',
    ];

}
