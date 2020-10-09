<?php
include 'Base.php';
include 'phpqrcode/phpqrcode.php';
/* 
 * 童攀课堂
 * https://www.tongpankt.com/
 */

class WeiXinPay2 extends Base
{
    //1.调用统一下单API 后去二维码支付链接
    public function getQrUrl($outTradeNo,$orderTotalPrice){
        //调用统一下单API
           $params = [
               'appid'=> self::APPID,
                'mch_id'=> self::MCHID,
                'nonce_str'=>md5(time()),
                'body'=> '扫码支付模式二',
                'out_trade_no'=> $outTradeNo,
                'total_fee'=> $orderTotalPrice,        // 微信支付安分计算
                'spbill_create_ip'=>'127.0.0.1',    // $_SERVER['SERVER_ADDR']
                'notify_url'=> self::NOTIFY,
                'trade_type'=>'NATIVE',
                'product_id'=>$outTradeNo
           ];
       $arr = $this->unifiedorder($params);
       return $arr['code_url'];
    }

}

