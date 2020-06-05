<?php
namespace app\common\validate;

use think\Validate;

class Goods extends Validate
{
    protected $rule =   [
        'goods_name'  => 'require|unique:goods',
        'category_id'   => 'require',
        'markte_price' => 'require|number',
        'shop_price' => 'require|number',
        'goods_weight' => 'require|number',
    ];

    protected $message  =   [
        'goods_name.require' => '商品名称不能为空',
        'goods_name.unique'     => '商品名称不能重复',
        'category_id.require'   => '商品所属栏目不能为空',
        'markte_price.require'  => '市场价不能重复',
        'markte_price.number'  => '市场价必须是数字',
        'shop_price.require'  => '本店价不能重复',
        'shop_price.number'  => '本店价必须是数字',
        'goods_weight.require'  => '重量不能重复',
        'goods_weight.number'  => '重量必须是数字',
    ];

}
