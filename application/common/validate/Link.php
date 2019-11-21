<?php
namespace app\common\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule =   [
        'title'  => 'require|unique:link',
    ];

    protected $message  =   [
        'title.require' => '链接名称不能为空',
        'title.unique'     => '链接名称不能重复',
    ];

}
