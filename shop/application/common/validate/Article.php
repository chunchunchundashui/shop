<?php
namespace app\common\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule =   [
        'title'  => 'require|unique:article',
        'email' => 'email|unique:article',
        'cate_id'   => 'require',
        'link_url' => 'url',
    ];

    protected $message  =   [
        'title.require' => '标题不能为空',
        'title.unique'     => '标题不能重复',
        'email.email'     => '邮箱格式错误',
        'email.unique'     => '邮箱不能重复',
        'cate_id.require'  => '所属栏目不能为空',
        'link_url.url' => '外链格式不正确',
    ];

}
