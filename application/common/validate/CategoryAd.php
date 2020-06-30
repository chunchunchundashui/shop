<?php
namespace app\common\validate;

use think\Validate;

class CategoryAd extends Validate
{
    protected $rule =   [
        'category_id'  => 'require',
        'img_src'  => 'require',
        'position'  => 'require',
    ];

    protected $message  =   [
        'category_id.require' => '关联栏目不能为空',
        'img_src.require' => '图片不能为空',
        'position.require' => '存放地址不能为空',
    ];

}
