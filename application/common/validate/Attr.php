<?php
namespace app\common\validate;

use think\Validate;

class Attr extends Validate
{
    protected $rule =   [
        'type_id'  => 'require',
        'attr_name'  => 'require|unique:attr',
        'attr_values'  => 'require',
    ];

    protected $message  =   [
        'type_id.require' => '所属分类不能为空',
        'attr_values.require' => '所属分值不能为空',
        'attr_name.require' => '所属名称不能为空',
        'attr_name.unique'     => '所属名称不能重复',
    ];

}
