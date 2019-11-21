<?php
namespace app\common\validate;

use think\Validate;

class MemberLevel extends Validate
{
    protected $rule =   [
        'type_name'  => 'require|unique:brand',
    ];

    protected $message  =   [
        'type_name.require' => '商品类型不能为空',
        'type_name.unique'     => '商品类型不能重复',
    ];

}
