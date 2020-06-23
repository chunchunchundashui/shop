<?php
namespace app\common\validate;

use think\Validate;

class CategoryWords extends Validate
{
    protected $rule =   [
        'category_id' => 'require',
        'word'  => 'require|unique:categoryWords',
        'link_url'  => 'require',
    ];

    protected $message  =   [
        'category_id' => '顶级栏目不能为空',
        'word.require' => '推荐词名称不能为空',
        'word.unique'     => '推荐词名称不能重复',
        'link_url.require' => '地址不能为空',
    ];

}
