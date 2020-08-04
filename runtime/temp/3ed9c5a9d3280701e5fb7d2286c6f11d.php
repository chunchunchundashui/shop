<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"D:\phpStudy\WWW\shop/application/index\view\common\tip_info.htm";i:1594994950;s:59:"D:\phpStudy\WWW\shop\application\index\view\common\head.htm";i:1594995753;s:61:"D:\phpStudy\WWW\shop\application\index\view\common\footer.htm";i:1592318019;}*/ ?>
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="Keywords" content="大商创 免费商城系统 免费B2B2C 免费多商户系统  多店铺商城系统 企业级电商系统  ecsho"/>
  <meta name="Description"
        content="大商创是由商创网络（模板堂）推出的免费B2B2C商城系统，支持多店铺入驻，包含多城市多仓库等众多功能，能帮助企业及个人快速搭建多商户电商系统，并减少二次开发带来的成本"/>

  <title>购物流程_大商创-免费B2B2C商城系统，免费多商户商城系统，多店铺商城系统，企业级电商系统免费下载_模板堂出</title>


  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/base.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/iconfont.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/purebox.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/quickLinks.css"/>

  <script type="text/javascript" src="/shop/public/static/index/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery.json.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/transport_jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="js/perfect-scrollbar/perfect-scrollbar.min.css"/>
</head>

<body>

<div class="site-nav" id="site-nav">
	<div class="w <?php if(isset($show_right)) { echo 'w1200';}else { echo 'w1390';} ?>">
		<div class="fl">
			<div class="city-choice" id="city-choice" data-ectype="dorpdown">
				<div class="dorpdown-layer">
					<div class="scrollBody" id="scrollBody"></div>
				</div>
			</div><div class="txt-info" id="ECS_MEMBERZONE">

			</div>
		</div>
		<ul class="quick-menu fr">
			<?php if(is_array($navRes['top']) || $navRes['top'] instanceof \think\Collection || $navRes['top'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navRes['top'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top_nav): $mod = ($i % 2 );++$i;?>
			<li class="spacer"></li>
			<li>
				<div class="dt"><a <?php if($top_nav['open'] == 1): ?> target="_blank" <?php endif; ?> href="<?php echo $top_nav['nav_url']; ?>"><?php echo $top_nav['nav_name']; ?></a></div>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<div class="header">
	<div class="w <?php if(isset($show_right)) { echo 'w1200';}else { echo 'w1390';} ?>">
		<div class="logo">
			<div class="logoImg"><a href="<?php echo url('index/index/index'); ?>"><img src="/shop/public/static/index/img/logo.png" /></a></div>
		</div>
		<div class="dsc-search">
			<div class="form">
				<form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()" class="search-form">
					<input autocomplete="off" onKeyUp="lookup(this.value);" name="keywords" type="text" id="keyword" value="内衣" class="search-text"/>
					<input type="hidden" name="store_search_cmt" value="0">
					<button type="submit" class="button button-goods" onclick="checkstore_search_cmt(0)" >搜商品</button>
				</form>
				<ul class="keyword">
					<li><a href="#" target="_blank">周大福</a></li>
					<li><a href="#" target="_blank">内衣</a></li>
					<li><a href="#" target="_blank">Five Plus</a></li>
					<li><a href="#" target="_blank">手机</a></li>
				</ul>

				<div class="suggestions_box" id="suggestions" style="display:none;">
					<div class="suggestions_list" id="auto_suggestions_list">
						&nbsp;
					</div>
				</div>

			</div>
		</div>
		<div class="shopCart" data-ectype="dorpdown" id="ECS_CARTINFO" data-carteveval="0">

			<div class="shopCart-con dsc-cm">
				<a href="#">
					<i class="iconfont icon-carts"></i>
					<span>我的购物车</span>
					<em class="count cart_num">0</em>
				</a>
			</div>
			<div class="dorpdown-layer" ectype="dorpdownLayer">
				<div class="prompt"><div class="nogoods"><b></b><span>购物车中还没有商品，赶紧选购吧！</span></div></div>
			</div>

			<script type="text/javascript">



              // ajax异步获取顶级分类下的子分类,品牌,频道等相关信息在右侧菜单显示
              var ajax_cate_url = "<?php echo url('index/Category/getCateInfo'); ?>";
              // 待加载中的图片路径
              var load_img = "/shop/public/static/index/img/loadGoods.gif";


              function changenum(rec_id, diff, warehouse_id, area_id)
              {
                var cValue = $('#cart_value').val();
                var goods_number =Number($('#goods_number_' + rec_id).text()) + Number(diff);

                if(goods_number < 1)
                {
                  return false;
                }
                else
                {
                  change_goods_number(rec_id,goods_number, warehouse_id, area_id, cValue);
                }
              }
              function change_goods_number(rec_id, goods_number, warehouse_id, area_id, cValue)
              {
                if(cValue != '' || cValue == 'undefined'){
                  var cValue = $('#cart_value').val();
                }
                Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number +'&cValue=' + cValue +'&warehouse_id=' + warehouse_id +'&area_id=' + area_id, change_goods_number_response, 'POST','JSON');
              }
              function change_goods_number_response(result)
              {
                var rec_id = result.rec_id;
                if (result.error == 0)
                {
                  $('#goods_number_' +rec_id).val(result.goods_number);//更新数量
                  $('#goods_subtotal_' +rec_id).html(result.goods_subtotal);//更新小计
                  if (result.goods_number <= 0)
                  {
                    //数量为零则隐藏所在行
                    $('#tr_goods_' +rec_id).style.display = 'none';
                    $('#tr_goods_' +rec_id).innerHTML = '';
                  }
                  $('#total_desc').html(result.flow_info);//更新合计
                  if($('ECS_CARTINFO'))
                  

                  if(result.group.length > 0){
                    for(var i=0; i<result.group.length; i++){
                      $("#" + result.group[i].rec_group).html(result.group[i].rec_group_number);//配件商品数量
                      $("#" + result.group[i].rec_group_talId).html(result.group[i].rec_group_subtotal);//配件商品金额
                    }
                  }

                  $("#goods_price_" + rec_id).html(result.goods_price);
                  $(".cart_num").html(result.subtotal_number);
                }
                else if (result.message != '')
                {
                  $('#goods_number_' +rec_id).val(result.cart_Num);//更新数量
                  alert(result.message);
                }
              }

              function deleteCartGoods(rec_id,index)
              {
                Ajax.call('delete_cart_goods.php', 'id='+rec_id+'&index='+index, deleteCartGoodsResponse, 'POST', 'JSON');
              }

              /**
               * 接收返回的信息
               */
              function deleteCartGoodsResponse(res)
              {
                if (res.error)
                {
                  alert(res.err_msg);
                }
                else if(res.index==1)
                {
                  Ajax.call('get_ajax_content.php?act=get_content', 'data_type=cart_list', return_cart_list, 'POST', 'JSON');
                }
                else
                {
                  $("#ECS_CARTINFO").html(res.content);
                  $(".cart_num").html(res.cart_num);
                }
              }

              function return_cart_list(result)
              {
                $(".cart_num").html(result.cart_num);
                $(".pop_panel").html(result.content);
                tbplHeigth();
              }
			</script>
			<!--ajax异步刷新判断用户是否勾选默认登陆 -->
			<script src="/shop/public/static/lib/layer/layer.js"></script>
			<script>
              //  这个地址是在login.js下面
              var checkLogin = "<?php echo url('member/account/checkLogin'); ?>";
              var loginOut = "<?php echo url('member/user/loginOut'); ?>";
			</script>
			<!-- 引入异步登陆js -->
			<script type="text/javascript" src="/shop/public/static/index/js/login.js"></script>
		</div>
	</div>
</div>

<div class="nav dsc-zoom">
	<!-- 调整头部大小从cate中声明一个变量 -->
	<div class="w <?php if(isset($show_right)) { echo 'w1200';}else { echo 'w1390';} ?>">
		<div class="categorys <?php if(!isset($show_nav)) { echo 'site-mast';}?>">
			<div class="categorys-type"><a href="#" target="_blank">全部商品分类</a></div>
			<div class="categorys-tab-content">
				<div class="categorys-items" id="cata-nav">
					<!--  菜单开始 -->
					<?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
					<div class="categorys-item" ectype="cateItem" data-id="<?php echo $cate['id']; ?>" data-eveval="0">
						<div class="item item-content">
							<i class="iconfont <?php echo $cate['iconfont']; ?>"></i>
							<div class="categorys-title">
								<strong>
									<a href="<?php echo url('index/Category/index', array('id' => $cate['id'])); ?>" target="_blank"><?php echo $cate['cate_name']; ?></a>
								</strong>
								<span>
									<?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$son_cate): $mod = ($i % 2 );++$i;if($i < 3): ?>
									<a href="<?php echo url('index/Category/index', array('id' => $son_cate['id'])); ?>" target="_blank"><?php echo $son_cate['cate_name']; ?></a>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</span>
							</div>
						</div>
						<div class="categorys-items-layer" ectype="cateLayer">
							<div class="cate-layer-con clearfix">
								<div class="cate-layer-left">
									<div class="cate_channel" ectype="channels_<?php echo $cate['id']; ?>"></div>
									<div class="cate_detail" ectype="subitems_<?php echo $cate['id']; ?>"></div>
								</div>
								<div class="cate-layer-rihgt" ectype="brands_<?php echo $cate['id']; ?>"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 菜单结束 -->
				</div>
			</div>
		</div>
		<div class="nav-main" id="nav">
			<ul class="navitems">
				<li><a href="<?php echo url('index/index/index'); ?>" class="curr">首页</a></li>
				<?php if(is_array($navRes['mid']) || $navRes['mid'] instanceof \think\Collection || $navRes['mid'] instanceof \think\Paginator): $i = 0; $__LIST__ = $navRes['mid'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mid_nav): $mod = ($i % 2 );++$i;?>
				<li>
					<div class="dt"><a <?php if($mid_nav['open'] == 1): ?> target="_blank" <?php endif; ?> href="<?php echo $mid_nav['nav_url']; ?>"><?php echo $mid_nav['nav_name']; ?></a></div>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>
  <div class="w w1200">
    <div class="shopend-warp">
      <div class="shopend-info">
        <div class="s-i-left"><i class="ico-success"></i></div>
        <div class="s-i-right">
          <h3><?php echo $msg; ?></h3>
          <div class="s-i-btn">
            <a href="user.php?act=order_list" class="btn sc-redBg-btn">返回上一页</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="footer-new">
	<div class="footer-new-top">
		<div class="w w1200">
			<div class="service-list">
				<div class="service-item">
					<i class="f-icon f-icon-qi"></i>
					<span>七天包退</span>
				</div>
				<div class="service-item">
					<i class="f-icon f-icon-zheng"></i>
					<span>正品保障</span>
				</div>
				<div class="service-item">
					<i class="f-icon f-icon-hao"></i>
					<span>好评如潮</span>
				</div>
				<div class="service-item">
					<i class="f-icon f-icon-shan"></i>
					<span>闪电发货</span>
				</div>
				<div class="service-item">
					<i class="f-icon f-icon-quan"></i>
					<span>权威荣誉</span>
				</div>
			</div>
			<div class="contact">
				<div class="contact-item contact-item-first"><i class="f-icon f-icon-tel"></i><span>4000-000-000</span></div>
				<div class="contact-item">
					<a id="IM" im_type="dsc" onclick="openWin(this)" href="javascript:;" class="btn-ctn"><i class="f-icon f-icon-kefu"></i><span>咨询客服</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-new-con">
		<div class="fnc-warp">
			<div class="help-list">
				<?php if(is_array($helpCateRes) || $helpCateRes instanceof \think\Collection || $helpCateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $helpCateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
				<div class="help-item">
					<h3><?php echo $cate['cate_name']; ?> </h3>
					<ul>
						<?php if(is_array($cate['arts']) || $cate['arts'] instanceof \think\Collection || $cate['arts'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['arts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php if($arts['link_url']): ?> <?php echo $arts['link_url']; else: ?><?php echo url('index/article/index', array('id' => $arts['id'])); endif; ?>"><?php echo $arts['title']; ?></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="qr-code">
				<div class="qr-item qr-item-first">
					<div class="code_img"><img src="/shop/public/static/index/img/ecjia_qrcode.png"></div>
					<div class="code_txt">官方网址</div>
				</div>
				<div class="qr-item">
					<div class="code_img"><img src="/shop/public/static/index/img/ectouch_qrcode.png"></div>
					<div class="code_txt">在线课程</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-new-bot">
		<div class="w w1200">

			<p class="copyright_links">
				<a href="<?php echo url('index/index/index'); ?>">首页</a>
				<span class="spacer"></span>
				<?php if(is_array($shopInfoRes) || $shopInfoRes instanceof \think\Collection || $shopInfoRes instanceof \think\Paginator): $i = 0; $__LIST__ = $shopInfoRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($i % 2 );++$i;?>
				<a href="<?php echo url('index/Article/index', array('id' => $arts['id'])); ?>"><?php echo $arts['title']; ?></a>
				<span class="spacer"></span>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</p>

			<p><span>©&nbsp;2015-2017&nbsp;tongpankt.com&nbsp;版权所有&nbsp;&nbsp;</span><span>ICP备案证书号:</span><a href="#">豫ICP备*****号-1</a>&nbsp;<a href="#">POWERED by童攀课堂</a></p>

			<p class="copyright_auth">&nbsp;</p>
		</div>
	</div>


	<div class="hide" id="pd_coupons">
		<span class="success-icon m-icon"></span>
		<div class="item-fore">
			<h3>领取成功！感谢您的参与，祝您购物愉快~</h3>
			<div class="txt ftx-03">本活动为概率性事件，不能保证所有客户成功领取优惠券</div>
		</div>
	</div>


	<div class="hidden">
		<input name="seller_kf_IM" value="" rev="" ru_id="" type="hidden">
		<input name="seller_kf_qq" value="349488953" type="hidden">
		<input name="seller_kf_tel" value="4000-000-000" type="hidden">
		<input name="user_id" value="62" type="hidden">
	</div>
</div>

<script type="text/javascript" src="/shop/public/static/index/js/suggest.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/scroll_city.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/utils.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/warehouse.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/warehouse_area.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/shopping_flow.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.nyroModal.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/lib_ecmobanFunc.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="themes/ecmoban_dsc2017/js/dsc-common.js"></script>
<script type="text/javascript" src="themes/ecmoban_dsc2017/js/jquery.purebox.js"></script>
<script type="text/javascript" src="themes/ecmoban_dsc2017/js/region.js"></script>

<script type="text/javascript">
  $(function () {
    $(".p-mode-list .p-mode-item").click(function () {
      var onlinepay_type = $(this).attr('flag');
      var order_sn = $(this).attr('order_sn');
      $.ajax({
        async: false,
        url: "flow.php?act=onlinepay_edit&onlinepay_type=" + onlinepay_type + "&order_sn=" + order_sn,
      });
    });


    $(".p-mode-item input").click(function () {
      var content = $("#pay_Dialog").html();
      pb({
        id: "payDialog",
        title: json_languages.payTitle,
        width: 550,
        height: 300,
        content: content,
        drag: false,
        foot: false
      });
    });

    //微信支付定时查询订单状态 by wanglu
    checkOrder();

    //微信扫码
    $("[data-type='wxpay']").on("click", function () {
      var content = $("#wxpay_dialog").html();
      pb({
        id: "scanCode",
        title: "",
        width: 716,
        content: content,
        drag: true,
        foot: false,
        cl_cBtn: false,
        cBtn: false
      });
    });
  });

  var timer;

  function checkOrder() {
    var pay_name = "在线支付";
    var pay_status = "0";
    var url = "flow.php?step=checkorder&order_id=17";
    if (pay_name == json_languages.payment_is_online && pay_status == 0) {
      $.get(url, {}, function (data) {
        //已付款
        if (data.code > 0 && data.pay_code == 'wxpay') {
          clearTimeout(timer);
          location.href = "respond.php?code=" + data.pay_code + "&status=1";
        }
      }, 'json');
    }
    timer = setTimeout("checkOrder()", 5000);
  }
</script>

<script type="text/javascript">
  $(function () {
    $("input[name='store_order']").val(0);

    $(document).on('click', "[ectype='store_order']", function () {
      var i = 0;
      $("*[ectype='ckShopAll']").each(function () {
        var t = $(this);
        if (t.prop("checked") == true) {
          i++
        }
      });

      if (i > 1) {
        pbDialog(json_languages.not_seller_batch_goods_num, "", 0, '', '', 55);
      } else {
        $("input[name='store_order']").val(1);
        $("form[name='formCart']").submit();
      }
    });
  })
</script>
</body>
</html>