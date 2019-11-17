<?php
namespace app\common\validate;

use think\Validate;

class Conf extends Validate
{
    protected $rule =   [
        'ename'  => 'require|unique:conf',
        'cname'  => 'require|unique:conf',
    ];

    protected $message  =   [
        'ename.require' => '配置英文名称不能为空',
        'ename.unique' => '配置英文名称不能为空',
        'cname.require' => '配置中文名称不能为空',
        'cname.unique'     => '配置中文名称不能重复',
    ];

}
