<?php
namespace app\common\validate;

use think\Validate;

class CategoryBrands extends Validate
{
    protected $rule =   [
        'category_id'  => 'require',
    ];

    protected $message  =   [
        'category_id.require' => '关联栏目不能为空',
    ];

}
