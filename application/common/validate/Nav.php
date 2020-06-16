<?php
namespace app\common\validate;

use think\Validate;

class Nav extends Validate
{
    protected $rule =   [
        'nav_name'  => 'require|unique:nav',
        'nav_url'   => 'url',
        'pos' => 'require',
    ];

    protected $message  =   [
        'nav_name.require' => '导航不能为空',
        'nav_name.unique'     => '导航不能重复',
        'nav_url.url'   => 'url格式不正确',
        'pos.require'  => '位置不能为空',
    ];

}
