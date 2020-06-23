<?php
namespace app\common\validate;

use think\Validate;

class Recpos extends Validate
{
    protected $rule =   [
        'rec_name'  => 'require|unique:recpos',
    ];

    protected $message  =   [
        'rec_name.require' => '推荐位不能为空',
        'rec_name.unique'     => '推荐位不能重复',
    ];

}
