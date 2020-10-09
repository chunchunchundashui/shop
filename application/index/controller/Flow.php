<?php
namespace app\index\controller;

use catetree\Catetree;
use think\Cache;
use think\captcha\Captcha;

class Flow extends Base
{
   public function addToCart()
   {
//       将添加到购物车的数据进行储存到cookie中
       $data = input('post.');
//       json_decode将数组转换为json
       $goodsObj = json_decode($data['goods']);
       $goodsId = $goodsObj->goods_id;      //string '40'
       $goodsAttr = $goodsObj->goods_attr;  //string '71,75'
       $goodsNum = $goodsObj->number;       //string '40'
       model('cart')->addToCart($goodsId, $goodsAttr,$goodsNum);
       $result = [
           'error' => 0,// error=0说明加入购物车成功,库存没问题,error=2说明库存不足,未加入购物车
           'one_step_buy' => 1,
       ];
       return json($result);
   }

//   加载购物车列表展示商品
    public function flow1()
    {
        $cartGoodsRes = model('Cart')->getGoodsListInCart();
        $this->assign([
            'cartGoodsRes' => $cartGoodsRes,
        ]);
        return view();
    }

    //    购物结算界面
    public function flow2()
    {
        $doGOods = input('cart_value');
        $doGoodsRes = model('Cart')->getGoodsListInCart($doGOods);
        $uAddress = db('address')->where('user_id', session('uid'))->find();
        $this->assign([
            'doGoodsRes' => $doGoodsRes,
            'uAddress' => $uAddress,
            'doGOods' => $doGOods,
        ]);
        return view();
    }

// 提交表单写入数据
    public function flow3()
    {
        $uid = session('uid');
        $doGOods = input('cart_value');     //选中购物车中的商品
//        判断用户是否登陆
//        统计用户收获信息
        $address = db('address');
        $aData['name'] = input('name');
        $aData['phone'] = input('phone');
        $aData['tel'] = input('tel');
        $aData['province'] = input('province');
        $aData['city'] = input('city');
        $aData['county'] = input('county');
        $aData['adress'] = input('adress');
        $aData['email'] = input('email');
        $aData['zipcode'] = input('zipcode');
        $aData['sign_building'] = input('sign_building');
        $aData['best_time'] = input('best_time');
        $aData['user_id'] = $uid;

//        处理用户收货地址信息  如果是第一次下单,就插入收货地址否则就修改地址
        $uAddress = $address->where('user_id', $uid)->find();

        if ($uAddress) {
            $address->where('user_id', $uid)->update($aData);
        }else{
            $address->insert($aData);
        }
//        处理订单基本信息表
        $orderData['out_trade_no'] = time().rand(111111,999999);
        $orderData['user_id'] = $uid;
        $orderData['goods_total_price'] = model('cart')->doGoodsPriceCount($doGOods);   //选中的购物车中的商品总价
        $orderData['post_spent'] = 0;      // 运费接口
        $orderData['order_total_price'] = ($orderData['goods_total_price']+$orderData['post_spent']);   //实际要支付的订单总价
        $orderData['payment'] = input('payment');
        $orderData['distribution'] = input('distribution');
        $orderData['name'] = input('name');
        $orderData['phone'] = input('phone');
        $orderData['province'] = input('province');
        $orderData['city'] = input('city');
        $orderData['county'] = input('county');
        $orderData['adress'] = input('adress');
        $orderData['create_time'] = time();
        //        新增数据并返回主键值
        $orderId = db('order')->insertGetId($orderData);
//        处理订单中商品的基本信息
        if ($orderId) {
            $doGoodsRes = model('Cart')->getGoodsListInCart($doGOods);
            foreach($doGoodsRes as $k => $v) {
                $ogData['goods_id'] = $v['goods_id'];
                $ogData['goods_name'] = $v['goods_name'];
                $ogData['member_price'] = $v['member_price'];
                $ogData['shop_price'] = $v['shop_price'];
                $ogData['market_price'] = $v['market_price'];
                $ogData['goods_attr_id'] = $v['goods_id_attr_id']; //含商品id    40-62,67
                $ogData['goods_attr_str'] = $v['goods_attr_str'];
                $ogData['goods_num'] = $v['goods_num'];
                $ogData['order_id'] = $orderId;
                db('order_goods')->insert($ogData);
            }
            $this->success('下单成功!', url('index/Flow/flow4', array('oid' => $orderId), ''));
        }
    }

//    提交订单结算界面
    public function flow4()
    {
        $orderId = input('oid');
        $orderInfo = db('order')->field('id, out_trade_no, order_total_price, payment, distribution, adress, phone, city, county, adress, user_id, name, province, pay_status')->find($orderId);
        if($orderInfo['payment'] == 1 && $orderInfo['pay_status'] == 0){
//            include('./pay/alipayapi.php');
            include('./pay/alipay/alipay.php');
            $payBtn = $sHtml;
//            $payBtn = $html_text;
            $this->assign([
                'payBtn' => $payBtn,
            ]);
        }
        $this->assign([
            'orderInfo' => $orderInfo,
        ]);
        return view();
    }

//    微信支付生成二维码
    public function wxewm($outTradeNo)
    {
//        获取订单的总价
        $orderTotalPrice = db('order')->where('out_trade_no',$outTradeNo)->value('order_total_price');
        $orderTotalPrice = $orderTotalPrice*100;
        include('./pay/wxpay/index2.php');
        $obj = new \WeiXinPay2();
        $qrurl = $obj->getQrUrl($outTradeNo,$orderTotalPrice);
        //2.生成二维码
        \QRcode::png($qrurl);
    }

// 微信支付成功回调
    public function wxPaySuccess()
    {
        include('./pay/wxpay/notify.php');
        new \Notify();
    }
    
//    微信异步获取支付状态
    public function wxPayStatus()
    {
        $outTradeOn = input('out_trade_no');
        $payStatus = db('order')->where('out_trade_no',$outTradeOn)->value('pay_status');
        return json(['pay_status' => $payStatus]);
    }
    
//    支付成功页面
    public function paySuccess()
    {
        $orderDb = db('order');
        $arr = input('get.');
        $outTradeNo = $arr['out_trade_no'];
        $orderInfo = $orderDb->where('out_trade_no',$outTradeNo)->find();
        if ($orderInfo) {
            $orderDb->where('out_trade_no', $orderInfo['out_trade_no'])->update(array('pay_status' => 1));
        }
        $this->assign([
            'orderInfo' => $orderInfo,
        ]);
        return view();
    }

//    引入tp5db内到支付宝接口中
    public function aliNotiFy()
    {
        $orderDb = db('order');
        include('./pay/alipay/alipay.php');
//        include('./pay/alipayapi.php');
    }


//    进入购物车默认勾选所有商品计算价格,节省价格,总数
//      $recId为选中的商品的id字符串: 1,2,3
    public function ajaxCartGoodsAmount()
    {
        $recId = input('post.');
        $result = model('cart')->ajaxCartGoodsAmount($recId);
        return json($result);
    }

//    删除购物车中的商品
    public function dropGoods()
    {
        $idAttr = input('id_attr');
        model('cart')->delCart($idAttr);
        $this->redirect('index/Flow/flow1');
    }

//    批量删除购物车记录
    public function delCartGoods()
    {
        $cartValue = input('cart_value');   // 要批量删除的购物车记录   格式: 40-61,65@40-62,65@40-63,65@40-64,65
        model('cart')->delCartGoods($cartValue);
        return json(['status' => 1]); // 删除成功
    }

    // 修改购物车中的数量
    public function updateCart()
    {
      $idAttr = input('rec_id');
      $goodsNum = input('goods_number');
      return model('cart')->updateCart($idAttr, $goodsNum);
    }
    
//    实时显示购物车中的商品数量
    public function cartGoodsNum()
    {
        //        三元运算符先判断是否存在cookie值,如果有值我们就反序列化,:或者 如果没有值我们就加入一个新的数组
        $cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
        $cartGoodsNum = 0;
        foreach ($cart as $k => $v) {
            $cartGoodsNum += $v;
        }
        return json(['cart_goods_num' => $cartGoodsNum]);
    }



//   支付前如果没有登录会弹出一个登陆框
    public function loginDailog()
    {
        $backAct = input('back_act', '');
//        登陆
        $ajaxLoginUrl = url('member/Account/login');
        $content = "<div class=\"login-wrap\">\n\n    <div class=\"login-form\">\n    \t    \t<div class=\"coagent\">\n            <div class=\"tit\"><h3>用第三方账号直接登录</h3><span><\/span><\/div>\n            <div class=\"coagent-warp\">\n            \t                    <a href=\"oauth?type=qq&back_url=flow.php\" class=\"qq\"><b class=\"third-party-icon qq-icon\"><\/b><\/a>\n                            <\/div>\n        <\/div>\n                <div class=\"login-box\">\n            <div class=\"tit\"><h3>账号登录<\/h3><span><\/span><\/div>\n            <div class=\"msg-wrap\"><\/div>\n            <div class=\"form\">\n            \t<form name=\"formLogin\" action=\"ajax_user.php\" method=\"post\" onSubmit=\"userLogin();return false;\">\n                \t<div class=\"item\">\n                        <div class=\"item-info\">\n                            <i class=\"iconfont icon-name\"><\/i>\n                            <input type=\"text\" id=\"loginname\" name=\"username\" class=\"text\" value=\"\" placeholder=\"用户名/邮箱/手机\" \/>\n                        <\/div>\n                    <\/div>\n                    <div class=\"item\">\n                        <div class=\"item-info\">\n                            <i class=\"iconfont icon-password\"><\/i>\n                            <input type=\"password\" style=\"display:none\" autocomplete=\"off\"\/>\n                            <input type=\"password\" id=\"nloginpwd\" name=\"password\" autocomplete=\"off\" value=\"\" class=\"text\" placeholder=\"密码\" \/>\n                        <\/div>\n                    <\/div>\n                                        <div class=\"item\">\n                        

<!-- 验证码--> 
<!-- <div class=\"item-info\">\n                            <i class=\"iconfont icon-security\"><\/i>\n                            <input type=\"text\" id=\"captcha\" name=\"captcha\" value=\"\" class=\"text text-2 fl\" placeholder=\"验证码\" \/>\n                            <img src=\"\" alt=\"captcha\" class=\"captcha_img fl\" onClick=\"this.src='?' + 'rand=' + Math.random()\" \/>\n                        <\/div>\n                    <\/div>\n    -->                                

<div class=\"item\">\n                        <input id=\"remember\" name=\"remember\" type=\"checkbox\" class=\"ui-checkbox\">\n                        <label for=\"remember\" class=\"ui-label\">请保存我这次的登录信息。<\/label>\n                    <\/div>\n                    <div class=\"item item-button\">\n                    \t<input type=\"hidden\" name=\"dsc_token\" value=\"3e45204420fc456142024ac8c2359db6\" \/>\n                        <input type=\"hidden\" name=\"act\" value=\"act_login\" \/>\n                        <input type=\"hidden\" name=\"back_act\" value=\"".$backAct."\" \/>\n                        <input type=\"submit\" name=\"submit\" value=\"登&nbsp;&nbsp;录\" class=\"btn sc-redBg-btn\" \/>\n                    <\/div>\n                    <div class=\"lie\">\n                    \t<a href=\"user.php?act=get_password\" class=\"notpwd gary fl\" target=\"_blank\">忘记密码？<\/a>\n                    \t<a href=\"user.php?act=register\" class=\"notpwd red fr\" target=\"_blank\">免费注册<\/a>                    <\/div>\n                <input type=\"hidden\" name=\"_token\" value=\"JDResDjhGlw7FcabqUoFjykm9gVQD1E4CpKY085p\"><\/form>\n            <\/div>\n    \t<\/div>\n    <\/div>\n    <script src=\"https:\/\/x.dscmall.cn\/\/js\/base64.min.js\"><\/script>\n    <script type=\"text\/javascript\">\n\t\tvar username_empty=\"<i><\/i>\u8bf7\u8f93\u5165\u7528\u6237\u540d\";\n    \tvar username_shorter=\"<i><\/i>\u7528\u6237\u540d\u957f\u5ea6\u4e0d\u80fd\u5c11\u4e8e 4 \u4e2a\u5b57\u7b26\u3002\";\n    \tvar username_invalid=\"<i><\/i>\u7528\u6237\u540d\u53ea\u80fd\u662f\u7531\u5b57\u6bcd\u6570\u5b57\u4ee5\u53ca\u4e0b\u5212\u7ebf\u7ec4\u6210\u3002\";\n    \tvar password_empty=\"<i><\/i>\u8bf7\u8f93\u5165\u5bc6\u7801\";\n    \tvar password_shorter=\"<i><\/i>\u767b\u5f55\u5bc6\u7801\u4e0d\u80fd\u5c11\u4e8e 8 \u4e2a\u5b57\u7b26\u3002\";\n    \tvar confirm_password_invalid=\"<i><\/i>\u4e24\u6b21\u8f93\u5165\u5bc6\u7801\u4e0d\u4e00\u81f4\";\n    \tvar captcha_empty=\"<i><\/i>\u8bf7\u8f93\u5165\u9a8c\u8bc1\u7801\";\n    \tvar email_empty=\"<i><\/i>Email \u4e3a\u7a7a\";\n    \tvar email_invalid=\"<i><\/i>Email \u4e0d\u662f\u5408\u6cd5\u7684\u5730\u5740\";\n    \tvar agreement=\"<i><\/i>\u60a8\u6ca1\u6709\u63a5\u53d7\u534f\u8bae\";\n    \tvar msn_invalid=\"<i><\/i>msn\u5730\u5740\u4e0d\u662f\u4e00\u4e2a\u6709\u6548\u7684\u90ae\u4ef6\u5730\u5740\";\n    \tvar qq_invalid=\"<i><\/i>QQ\u53f7\u7801\u4e0d\u662f\u4e00\u4e2a\u6709\u6548\u7684\u53f7\u7801\";\n    \tvar home_phone_invalid=\"<i><\/i>\u5bb6\u5ead\u7535\u8bdd\u4e0d\u662f\u4e00\u4e2a\u6709\u6548\u53f7\u7801\";\n    \tvar office_phone_invalid=\"<i><\/i>\u529e\u516c\u7535\u8bdd\u4e0d\u662f\u4e00\u4e2a\u6709\u6548\u53f7\u7801\";\n    \tvar mobile_phone_invalid=\"<i><\/i>\u624b\u673a\u53f7\u7801\u4e0d\u662f\u4e00\u4e2a\u6709\u6548\u53f7\u7801\";\n    \tvar msg_un_blank=\"<i><\/i>\u7528\u6237\u540d\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_un_length=\"<i><\/i>\u7528\u6237\u540d\u6700\u957f\u4e0d\u5f97\u8d85\u8fc715\u4e2a\u5b57\u7b26\uff0c\u4e00\u4e2a\u6c49\u5b57\u7b49\u4e8e2\u4e2a\u5b57\u7b26\";\n    \tvar msg_un_format=\"<i><\/i>\u7528\u6237\u540d\u542b\u6709\u975e\u6cd5\u5b57\u7b26\";\n    \tvar msg_un_registered=\"<i><\/i>\u7528\u6237\u540d\u5df2\u7ecf\u5b58\u5728,\u8bf7\u91cd\u65b0\u8f93\u5165\";\n    \tvar msg_can_rg=\"<i><\/i>\u53ef\u4ee5\u6ce8\u518c\";\n    \tvar msg_email_blank=\"<i><\/i>\u90ae\u4ef6\u5730\u5740\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_email_registered=\"<i><\/i>\u90ae\u7bb1\u5df2\u5b58\u5728,\u8bf7\u91cd\u65b0\u8f93\u5165\";\n    \tvar msg_email_format=\"<i><\/i>\u683c\u5f0f\u9519\u8bef\uff0c\u8bf7\u8f93\u5165\u6b63\u786e\u7684\u90ae\u7bb1\u5730\u5740\";\n    \tvar msg_blank=\"<i><\/i>\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar no_select_question=\"<i><\/i>\u60a8\u6ca1\u6709\u5b8c\u6210\u5bc6\u7801\u63d0\u793a\u95ee\u9898\u7684\u64cd\u4f5c\";\n    \tvar passwd_balnk=\"<i><\/i>\u5bc6\u7801\u4e2d\u4e0d\u80fd\u5305\u542b\u7a7a\u683c\";\n    \tvar msg_phone_blank=\"<i><\/i>\u624b\u673a\u53f7\u7801\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_phone_registered=\"<i><\/i>\u624b\u673a\u5df2\u5b58\u5728,\u8bf7\u91cd\u65b0\u8f93\u5165\";\n    \tvar msg_phone_invalid=\"<i><\/i>\u65e0\u6548\u7684\u624b\u673a\u53f7\u7801\";\n    \tvar msg_phone_not_correct=\"<i><\/i>\u624b\u673a\u53f7\u7801\u4e0d\u6b63\u786e\uff0c\u8bf7\u91cd\u65b0\u8f93\u5165\";\n    \tvar msg_mobile_code_blank=\"<i><\/i>\u624b\u673a\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_mobile_code_not_correct=\"<i><\/i>\u624b\u673a\u9a8c\u8bc1\u7801\u4e0d\u6b63\u786e\";\n    \tvar msg_confirm_pwd_blank=\"<i><\/i>\u786e\u8ba4\u5bc6\u7801\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_identifying_code=\"<i><\/i>\u9a8c\u8bc1\u7801\u4e0d\u80fd\u4e3a\u7a7a\";\n    \tvar msg_identifying_not_correct=\"<i><\/i>\u9a8c\u8bc1\u7801\u4e0d\u6b63\u786e\";\n    \t\t\/* *\n\t\t * \u4f1a\u5458\u767b\u5f55\n\t\t*\/\n\t\tfunction userLogin()\n\t\t{\n\t\t\tvar frm = $(\"form[name='formLogin']\");\n\t\t\tvar username = frm.find(\"input[name='username']\");\n\t\t\tvar password = frm.find(\"input[name='password']\");\n\t\t\tvar captcha = frm.find(\"input[name='captcha']\");\n\t\t\tvar dsc_token = frm.find(\"input[name='dsc_token']\");\n\t\t\tvar error = frm.find(\".msg-error\");\n\t\t\tvar msg = '';\n\n\t\t\tif(username.val()==\"\"){\n\t\t\t\terror.show();\n\t\t\t\tusername.parents(\".item\").addClass(\"item-error\");\n\t\t\t\tmsg += username_empty;\n\t\t\t\tshowMesInfo(msg);\n\t\t\t\treturn false;\n\t\t\t}\n\n\t\t\tif(password.val()==\"\"){\n\t\t\t\terror.show();\n\t\t\t\tpassword.parents(\".item\").addClass(\"item-error\");\n\t\t\t\tmsg += password_empty;\n\t\t\t\tshowMesInfo(msg);\n\t\t\t\treturn false;\n\t\t\t}\n\n\t\t\tif(captcha.val()==\"\"){\n\t\t\t\terror.show();\n\t\t\t\tcaptcha.parents(\".item\").addClass(\"item-error\");\n\t\t\t\tmsg += captcha_empty;\n\t\t\t\tshowMesInfo(msg);\n\t\t\t\treturn false;\n\t\t\t}\n\t\t\tvar back_act=frm.find(\"input[name='back_act']\").val();\n\t\t\tvar base64password = Base64.encode(password.val());\n\n            \t\t\tAjax.call('".$ajaxLoginUrl."', 'username=' + username.val()+'&pwcode='+base64password+'&dsc_token='+dsc_token.val()+'&captcha='+captcha.val()+'&back_act='+back_act, return_login , 'POST', 'JSON');\n\t\t\t\t\t}\n\n\t\tfunction return_login(result)\n\t\t{\n\t\t\tif(result.error > 0)\n\t\t\t{\n\t\t\t\tshowMesInfo(result.message);\n\t\t\t\t$('.captcha_img').click();\n\t\t\t}\n\t\t\telse\n\t\t\t{\n\t\t\t\tif(result.ucdata){\n\t\t\t\t\t$(\"body\").append(result.ucdata)\n\t\t\t\t}\n\t\t\t\tlocation.href=result.url;\n\t\t\t}\n\t\t}\n\n\t\tfunction showMesInfo(msg) {\n\t\t\t$('.login-wrap .msg-wrap').empty();\n\t\t\tvar info = '<div class=\"msg-error\"><b><\/b>' + msg + '<\/div>';\n\t\t\t$('.login-wrap .msg-wrap').append(info);\n\t\t}\n\t<\/script>\n<\/div>\n";
        $content = stripcslashes($content);
        return json(['error' => 0,'message'=> '', "content" => $content]);
    }

    //生成验证码
    public function verify()
    {
        //如果gd库也开启了但是就是不能正常的生成验证码可以使用ob_clean()实现
        $config = array(
            'fontSize' => 20,              // 验证码字体大小(px)
            'useCurve' => false,            // 是否画混淆曲线
            'useNoise' => false,            // 是否添加杂点
            'imageH' => 50,               // 验证码图片高度
            'imageW' => 140,               // 验证码图片宽度
            'length' => 4,               // 验证码位数
            'codeSet'    =>  '0123456789',             // 验证码字体
            'reset ' => true
        );
        //实例化验证码类
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
}
