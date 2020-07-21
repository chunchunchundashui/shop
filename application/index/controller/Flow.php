<?php
namespace app\index\controller;

use catetree\Catetree;
use think\Cache;

class Flow extends Base
{
   public function addToCart()
   {
    model('cart')->addToCart();
   }
}
