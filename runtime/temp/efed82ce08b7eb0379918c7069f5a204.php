<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\phpStudy\WWW\shop/application/index\view\index\index.htm";i:1599661428;s:59:"D:\phpStudy\WWW\shop\application\index\view\common\head.htm";i:1597163051;s:61:"D:\phpStudy\WWW\shop\application\index\view\common\footer.htm";i:1592318019;}*/ ?>
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="Keywords" content="<?php echo $configs['site_keywords']; ?>"/>
  <meta name="Description" content="<?php echo $configs['site_description']; ?>"/>
  <title><?php echo $configs['site_name']; ?></title>
  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/base.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/iconfont.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/purebox.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/quickLinks.css"/>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery.json.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/transport_jquery.js"></script>

</head>
<body class="home_visual_body">

<div class="top-banner" style="background: rgb(255, 40, 125) none repeat scroll 0% 0%;">
  <div class="module w1200" data-type="range">

    <a href="#" target="_blank"><img src="/shop/public/static/index/img/1494985021864887905.jpg" width="1200" height="80"></a>
    <i class="iconfont icon-cha" ectype="close"></i>

  </div>
  <div class="spec"
       data-spec="{&quot;picHeight&quot;:&quot;500&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;navColor&quot;:&quot;#ff287d&quot;,&quot;is_li&quot;:0,&quot;bg_color&quot;:[],&quot;pic_src&quot;:[&quot;/shop/public/static/index/img/1494985021864887905.jpg&quot;],&quot;link&quot;:&quot;&quot;,&quot;sort&quot;:[&quot;1&quot;]}"></div>
</div>

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
				<a href="<?php echo url('index/Flow/flow1'); ?>">
					<i class="iconfont icon-carts"></i>
					<span>我的购物车</span>
					<em id="cart_goods_num" class="count cart_num">0</em>
				</a>
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
              //实时更新添加到购物车中的商品数量
              var cart_goods_num = "<?php echo url('index/Flow/cartGoodsNum'); ?>";

              var pleace_login = "<?php echo url('member/account/login'); ?>";

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
<div class="homeindex" ectype="homeWrap">

  <div class="content" style="min-height: 974px;">
    <div class="visual-item" data-mode="lunbo" data-purebox="banner" data-li="1" data-length="5" ectype="visualItme"
         style="display: block;" data-diff="0">

      <div class="view">
        <div class="banner home-banner">
          <div class="bd">
            <ul data-type="range">
              <?php if(is_array($alterImg) || $alterImg instanceof \think\Collection || $alterImg instanceof \think\Paginator): $i = 0; $__LIST__ = $alterImg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?>
              <li style="background:url(/shop/public/static/uploads/<?php echo $img['img_src']; ?>) center center no-repeat;">
                <div class="banner-width"><a href="<?php echo $img['link_url']; ?>" target="_blank" style="height:500px;"></a></div>
              </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="spec" data-spec=""></div>
          </div>
          <div class="hd">
            <ul></ul>
          </div>
          <div class="vip-outcon">
            <div class="vip-con">
              <div class="insertVipEdit" data-mode="insertVipEdit">

                <div ectype="user_info">
                  <div class="avatar">
                    <a href="user.php?act=profile"><img src="/shop/public/static/index/img/avatar.png"></a>
                  </div>
                  <div class="login-info">
                    <span>Hi，欢迎来到大商创!</span>
                    <a href="user.php" class="login-button">请登录</a>
                    <a href="merchants.php" target="_blank" class="register_button">我要开店</a>
                  </div>
                </div>
                <div class="vip-item">
                  <div class="tit">
                    <a href="javascript:void(0);" class="tab_head_item">公告</a>
                    <a href="javascript:void(0);" class="tab_head_item">促销</a>
                  </div>
                  <div class="con">
                    <ul>
                      <?php if(is_array($anment) || $anment instanceof \think\Collection || $anment instanceof \think\Paginator): $i = 0; $__LIST__ = $anment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($i % 2 );++$i;?>
                      <li><a href="<?php echo url('index/Article/index', array('id' => $arts['id'])); ?>" target="_blank"><?php echo $arts['title']; ?></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <ul style="display:none;">
                      <?php if(is_array($salesRes) || $salesRes instanceof \think\Collection || $salesRes instanceof \think\Paginator): $i = 0; $__LIST__ = $salesRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($i % 2 );++$i;?>
                      <li><a href="<?php echo url('index/Article/index', array('id' => $arts['id'])); ?>" target="_blank"><?php echo $arts['title']; ?></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                  </div>
                </div>
                <div class="vip-item">
                  <div class="tit">快捷入口</div>
                  <div class="kj_con">
                    <div class="item item_1">
                      <a href="history_list.php" target="_blank">
                        <i class="iconfont icon-browse"></i>
                        <span>我的浏览</span>
                      </a>
                    </div>
                    <div class="item item_2">
                      <a href="user.php?act=collection_list" target="_blank">
                        <i class="iconfont icon-zan-alt"></i>
                        <span>我的收藏</span>
                      </a>
                    </div>
                    <div class="item item_3">
                      <a href="user.php?act=order_list" target="_blank">
                        <i class="iconfont icon-order"></i>
                        <span>我的订单</span>
                      </a>
                    </div>
                    <div class="item item_4">
                      <a href="user.php?act=account_safe" target="_blank">
                        <i class="iconfont icon-password-alt"></i>
                        <span>账号安全</span>
                      </a>
                    </div>
                    <div class="item item_5">
                      <a href="user.php?act=affiliate" target="_blank">
                        <i class="iconfont icon-share-alt"></i>
                        <span>我要分享</span>
                      </a>
                    </div>
                    <div class="item item_6">
                      <a href="merchants.php" target="_blank">
                        <i class="iconfont icon-settled"></i>
                        <span>商家入驻</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="spec" data-spec=""></div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="visual-item w1200" ectype="channel">
      <div class="seckill-channel" id="h-seckill">
        <div class="box-hd clearfix">
          <i class="box_hd_arrow"></i>
          <i class="box_hd_dec"></i>
          <i class="box-hd-icon"></i>
          <div class="sk-time-cd">
            <div class="sk-cd-tit">距结束</div>
            <div class="cd-time fl" ectype="time" data-time="2018-01-22 22:00:00">
              <div class="days hide">00</div>
              <span class="split hide">天</span>
              <div class="hours">05</div>
              <span class="split">时</span>
              <div class="minutes">57</div>
              <span class="split">分</span>
              <div class="seconds">46</div>
              <span class="split">秒</span>
            </div>
          </div>
          <div class="sk-more"><a href="seckill.php" target="_blank">更多秒杀</a> <i class="arrow"></i></div>
        </div>
        <div class="box-bd clearfix">
          <div class="tempWrap" style="overflow:hidden; position:relative; width:1210px">
            <ul style="width: 3872px; position: relative; overflow: hidden; padding: 0px; margin: 0px; left: -1936px;">
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=7" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102299856.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=7" target="_blank" title="新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女">新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女</a>
                </div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>279.59</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=7&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=58" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489106192791.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=58" target="_blank"
                                       title="歌梵 床头柜 地中海美式乡村蓝色田园床边柜 储物卧室家具 品质保障 用料环保 质保5年--不单卖">歌梵 床头柜 地中海美式乡村蓝色田园床边柜
                  储物卧室家具 品质保障 用料环保 质保5年--不单卖</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>2312.00</span>
                      <span class="original-price"><em>¥</em>240.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=58&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=8" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102753231.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=8" target="_blank" title="新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮">新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮</a>
                </div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>360.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=8&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=54" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490205126945.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=54" target="_blank"
                                       title="海得曼无线门铃 家用 不用电池门铃 智能自发电远距离一拖一拖二 按钮 不要电池 防水设计 两年换新">海得曼无线门铃 家用 不用电池门铃
                  智能自发电远距离一拖一拖二 按钮 不要电池 防水设计 两年换新</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>334.00</span>
                      <span class="original-price"><em>¥</em>99.60</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=54&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=9" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102950633.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=9" target="_blank"
                                       title="韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服">韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠
                  朴信惠同款 黑白拼接 插肩袖 棒球服</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>540.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=9&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=55" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490205156678.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=55" target="_blank"
                                       title="闽豹家用工具套装 五金工具箱 电工木工德国维修工具组套修理组合 质量稳定 坚固耐用 彩套包装 可团购定制">闽豹家用工具套装 五金工具箱
                  电工木工德国维修工具组套修理组合 质量稳定 坚固耐用 彩套包装 可团购定制</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>534.00</span>
                      <span class="original-price"><em>¥</em>99.60</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=55&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=10" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490174741051.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=10" target="_blank"
                                       title="初棉纯色圆领长袖T恤打底衫秋衣女上衣体恤女士修身打底衣春秋 挺拔有型 棉氨材质 柔软舒适 耐洗耐磨">初棉纯色圆领长袖T恤打底衫秋衣女上衣体恤女士修身打底衣春秋
                  挺拔有型 棉氨材质 柔软舒适 耐洗耐磨</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>78.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=10&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=56" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490205189180.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=56" target="_blank"
                                       title="JOMOO 厨房水槽套餐双槽304不锈钢洗碗池 洗菜盆加厚水盆一体水槽 官方正品 赠运费险 五年联保 领券更实惠">JOMOO
                  厨房水槽套餐双槽304不锈钢洗碗池 洗菜盆加厚水盆一体水槽 官方正品 赠运费险 五年联保 领券更实惠</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>834.00</span>
                      <span class="original-price"><em>¥</em>1078.80</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=56&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=6" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489100550574.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=6" target="_blank"
                                       title="法国DK正品文胸套装女内衣性感蕾丝聚拢深V调整型小胸品牌收副乳 法国正品 蕾丝性感 原装包装 送女神必备">法国DK正品文胸套装女内衣性感蕾丝聚拢深V调整型小胸品牌收副乳
                  法国正品 蕾丝性感 原装包装 送女神必备</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>309.59</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=6&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=57" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490209796384.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=57" target="_blank"
                                       title="航科家用按摩椅全自动全身电动多功能太空舱按摩器老人沙发椅 智能大腿气囊按摩 脚底3D推拿">航科家用按摩椅全自动全身电动多功能太空舱按摩器老人沙发椅
                  智能大腿气囊按摩 脚底3D推拿</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>2133.00</span>
                      <span class="original-price"><em>¥</em>2616.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=57&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=7" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102299856.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=7" target="_blank" title="新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女">新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女</a>
                </div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>279.59</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=7&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=58" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489106192791.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=58" target="_blank"
                                       title="歌梵 床头柜 地中海美式乡村蓝色田园床边柜 储物卧室家具 品质保障 用料环保 质保5年--不单卖">歌梵 床头柜 地中海美式乡村蓝色田园床边柜
                  储物卧室家具 品质保障 用料环保 质保5年--不单卖</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>2312.00</span>
                      <span class="original-price"><em>¥</em>240.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=58&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=8" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102753231.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=8" target="_blank" title="新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮">新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮</a>
                </div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>360.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=8&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=54" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490205126945.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=54" target="_blank"
                                       title="海得曼无线门铃 家用 不用电池门铃 智能自发电远距离一拖一拖二 按钮 不要电池 防水设计 两年换新">海得曼无线门铃 家用 不用电池门铃
                  智能自发电远距离一拖一拖二 按钮 不要电池 防水设计 两年换新</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>334.00</span>
                      <span class="original-price"><em>¥</em>99.60</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=54&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=9" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102950633.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=9" target="_blank"
                                       title="韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服">韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠
                  朴信惠同款 黑白拼接 插肩袖 棒球服</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>145.00</span>
                      <span class="original-price"><em>¥</em>540.00</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=9&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
              <li class="opacity_img clone" style="float: left; width: 232px;">
                <div class="p-img"><a href="seckill.php?id=55" target="_blank"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490205156678.jpg" class="img-lazyload"></a></div>
                <div class="p-name"><a href="seckill.php?id=55" target="_blank"
                                       title="闽豹家用工具套装 五金工具箱 电工木工德国维修工具组套修理组合 质量稳定 坚固耐用 彩套包装 可团购定制">闽豹家用工具套装 五金工具箱
                  电工木工德国维修工具组套修理组合 质量稳定 坚固耐用 彩套包装 可团购定制</a></div>
                <div class="p-over">
                  <div class="p-info">
                    <div class="p-price">
                      <span class="shop-price"><em>¥</em>534.00</span>
                      <span class="original-price"><em>¥</em>99.60</span>
                    </div>
                  </div>
                  <div class="p-btn">
                    <a href="seckill.php?id=55&amp;act=view" target="_blank">立即抢购</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <a href="javascript:void(0);" class="prev"><i class="iconfont icon-left"></i></a>
          <a href="javascript:void(0);" class="next"><i class="iconfont icon-right"></i></a>
        </div>
      </div>
      <input value="1" name="seckill_goods" type="hidden"></div>
    <div class="visual-item w1200" data-mode="h-need" data-purebox="homeAdv" data-li="1" ectype="visualItme"
         data-diff="0" style="display: block;">

      <div class="view">
        <div class="need-channel clearfix" id="h-need_0" data-type="range" data-lift="推荐">

          <div class="channel-column" style="background:url(/shop/public/static/index/img/1494984987302153402.jpg) no-repeat;">
            <div class="column-title">
              <h3 style="color: #ffffff">优质新品</h3>
              <p style="color: #ffffff">专注生活美学</p>
            </div>
            <div class="column-img"><img src="/shop/public/static/index/img/1494985002375136884.png"></div>
            <a href="" target="_blank" class="column-btn">去看看</a>
          </div>
          <div class="channel-column" style="background:url(/shop/public/static/index/img/1494984989930757668.jpg) no-repeat;">
            <div class="column-title">
              <h3 style="color: #ffffff">潮流女装</h3>
              <p style="color: #ffffff">春装流行款抢购</p>
            </div>
            <div class="column-img"><img src="/shop/public/static/index/img/1494984989766362152.png"></div>
            <a href="" target="_blank" class="column-btn">去看看</a>
          </div>
          <div class="channel-column" style="background:url(/shop/public/static/index/img/1494984989391013089.jpg) no-repeat;">
            <div class="column-title">
              <h3 style="color: #ffffff">人气美鞋</h3>
              <p style="color: #ffffff">新外貌“鞋”会</p>
            </div>
            <div class="column-img"><img src="/shop/public/static/index/img/1494984990383161028.png"></div>
            <a href="" target="_blank" class="column-btn">去看看</a>
          </div>
          <div class="channel-column" style="background:url(/shop/public/static/index/img/1494984987606903394.jpg) no-repeat;">
            <div class="column-title">
              <h3 style="color: #ffffff">品牌精选</h3>
              <p style="color: #ffffff">潮牌尖货 初春换新</p>
            </div>
            <div class="column-img"><img src="/shop/public/static/index/img/1494984988032635434.png"></div>
            <a href="" target="_blank" class="column-btn">去看看</a>
          </div>
          <div class="channel-column" style="background:url(/shop/public/static/index/img/1494984990175755536.jpg) no-repeat;">
            <div class="column-title">
              <h3 style="color: #ffffff">护肤彩妆</h3>
              <p style="color: #ffffff">春妆必买清单 低至3折</p>
            </div>
            <div class="column-img"><img src="/shop/public/static/index/img/1494984991251825734.png"></div>
            <a href="" target="_blank" class="column-btn">去看看</a>
          </div>
          <div class="spec" data-spec="" data-title=""></div>
        </div>
      </div>
    </div>
    <div class="visual-item w1200 brandList" data-mode="h-brand" data-purebox="homeAdv" data-li="1" ectype="visualItme"
         data-diff="0" style="display: block;">

      <div class="view">
        <div class="brand-channel clearfix" id="h-brand_0" data-type="range" data-lift="品牌">

          <div class="home-brand-adv slide_lr_info">
            <a href="" target="_blank"><img src="/shop/public/static/index/img/1494984992104112514.jpg" class="slide_lr_img"></a>
          </div>
          <div ectype="homeBrand">

            <div class="brand-list" id="recommend_brands">
              <!-- 处理换一批商品品牌 -->
              <!-- 引用的js放到了1558 -->
              <!-- 结束换一批商品品牌 -->
              <a href="javascript:void(0);" ectype="changeBrand" class="refresh-btn"><i
                  class="iconfont icon-rotate-alt"></i><span>换一批</span></a>
            </div>
          </div>
          <div class="spec" data-spec="" data-title="undefined"></div>
        </div>
      </div>
    </div>

    <!-- 开始循环大栏目块 -->
    <?php foreach($cateRes as $k => $v):?>
    <div class="visual-item w1200" data-mode="homeFloor" data-purebox="homeFloor" data-li="1" ectype="visualItme"
         data-diff="0" style="display: block;">

      <div class="view">
        <div class="floor-content" data-type="range" id="homeFloor_0" data-lift="女装">

          <div class="floor-line-con floorOne floor-color-type-1" data-title="男装女装" data-idx="1" id="floor_1"
               ectype="floorItem">
            <div class="floor-hd" ectype="floorTit">
              <i class="box_hd_arrow"></i>
              <i class="box_hd_dec"></i>
              <div class="hd-tit"><?php echo $v['cate_name']?></div>
              <div class="hd-tags">
                <ul>
                  <li class="first current">
                    <span>新品推荐</span>
                    <i class="arrowImg"></i>
                  </li>
                  <!--  循环二级分类 -->
                  <?php foreach($v['children'] as $k1 => $v1):?>
                  <li data-catgoods="" class="first" ectype="floor_cat_content" data-flooreveval="0" data-visualhome="1"
                      data-floornum="6" data-id="<?php echo $v1['id']?>">
                    <span><?php echo $v1['cate_name']?></span>
                    <i class="arrowImg"></i>
                  </li>
                  <?php endforeach;?>
                  <!-- 结束二级分类循环 -->
                </ul>
              </div>
            </div>
            <div class="floor-bd bd-mode-01">
              <div class="bd-left">
                <div class="floor-left-slide">
                  <div class="bd">
                    <!-- 循坏展示A位的轮播图 -->
                    <ul>
                      <?php if(isset($v['leftimgs']['A'])):foreach($v['leftimgs']['A'] as $k1 => $v1):?>
                      <li><a href="<?php echo $v1['link_url'];?>" target="_blank"><img src="/shop/public/static/pro_img/<?php echo $v1['img_src'];?>"></a></li>
                      <?php endforeach;endif;?>
                    </ul>
                    <!-- 结束循环展示A位的轮播图 -->
                  </div>
                  <div class="hd">
                    <ul></ul>
                  </div>
                </div>

                <div class="floor-left-adv">
                  <!-- 循坏展示B位图片 -->
                  <!-- 判断图片上是否存在 -->
                  <?php if(isset($v['leftimgs']['B']['0']['img_src'])):?>
                  <a href="<?php echo $v['leftimgs']['B']['0']['link_url'];?>" target="_blank"><img src="/shop/public/static/pro_img/<?php echo $v['leftimgs']['B']['0']['img_src'];?>"></a>
                  <?php endif;?>
                  <!-- 循坏展示C位图片 -->
                  <?php if(isset($v['leftimgs']['C']['0']['img_src'])):?>
                  <a href="<?php echo $v['leftimgs']['C']['0']['link_url'];?>" target="_blank"><img src="/shop/public/static/pro_img/<?php echo $v['leftimgs']['C']['0']['img_src'];?>"></a>
                  <?php endif;?>
                </div>

              </div>
              <div class="bd-right">
                <div class="floor-tabs-content clearfix">
                  <!--  新品推荐图列表开始 -->
                  <div class="f-r-main f-r-m-adv">
                    <ul class="p-list">
                      <?php foreach($v['newRecGoods'] as $k1 => $v1):?>
                      <li class="opacity_img">
                        <div class="product">
                          <div class="p-img"><a href="<?php echo url('index/Goods/index', array('id'=>$v1['id'])); ?>" target="_blank"><img src="/shop/public/static/uploads/<?php echo $v1['mid_thumb']?>" alt="" width="140" height="140"></a></div>
                          <div class="p-name"><a href="<?php echo url('index/Goods/index', array('id'=>$v1['id'])); ?>" title="<?php echo $v1['goods_name'];?>"><?php echo $v1['goods_name'];?></a></div>
                          <div class="p-price">
                            <span class="shop-price"><em>￥</em><?php echo $v1['shop_price']?></span>
                            <span class="original-price"><em>￥</em><?php echo $v1['markte_price']?></span>
                          </div>
                        </div>
                      </li>
                      <?php endforeach;?>
                    </ul>
                    <!-- 新品推荐图列表结束 -->
                  </div>

                  <!-- 对应栏目显示框 -->
                  <?php foreach($v['children'] as $k1 => $v1):?>
                  <div class="f-r-main" ectype="floor_cat_347">
                    <ul class="p-list">
                      <?php foreach($v1['bestGoods'] as $k2 => $v2):?>
                      <li class="opacity_img">
                        <div class="product">
                          <div class="p-img"><a href="<?php echo url('index/Goods/index', array('id'=>$v2['id'])); ?>" target="_blank"><img src="/shop/public/static/uploads/<?php echo $v2['mid_thumb']?>" alt="" width="140" height="140"></a></div>
                          <div class="p-name"><a href="<?php echo url('index/Goods/index', array('id'=>$v2['id'])); ?>" title="<?php echo $v2['goods_name'];?>"><?php echo $v2['goods_name'];?></a></div>
                          <div class="p-price">
                            <span class="shop-price"><em>￥</em><?php echo $v2['shop_price']?></span>
                            <span class="original-price"><em>￥</em><?php echo $v2['markte_price']?></span>
                          </div>
                        </div>
                      </li>
                      <?php endforeach;?>
                    </ul>
                  </div>
                  <?php endforeach;?>
                </div>
              </div>
            </div>
            <div class="floor-fd">
              <div class="floor-fd-brand clearfix">
                <?php foreach($v['brands']['brands'] as $k1 => $v1):?>
                <div class="item">
                  <a href="<?php echo $v1['brand_url'];?>" target="_blank">
                    <div class="link-l"></div>
                    <div class="img"><img src="/shop/public/static/uploads/<?php echo $v1['brand_img'];?>" title="<?php echo $v1['brand_name'];?>"></div>
                    <div class="link"></div>
                  </a>
                </div>
                <?php endforeach;?>
              </div>
            </div>
          </div>
          <div class="spec" data-spec="" data-title="undefined"></div>
        </div>
      </div>
    </div>
    <?php endforeach;?>
    <!-- 结束循环大栏目块 -->
    <div class="visual-item w1200" data-mode="guessYouLike" data-purebox="goods" ectype="visualItme" data-diff="0"
         style="display: block;">

      <div class="view">
        <div class="lift-channel clearfix" id="guessYouLike" data-type="range" data-lift="商品">
          <div data-goodstitle="title">
            <div class="ftit"><h3>还没逛够</h3></div>
          </div>
          <ul>
            <?php if(is_array($indexGoodsRes) || $indexGoodsRes instanceof \think\Collection || $indexGoodsRes instanceof \think\Paginator): $i = 0; $__LIST__ = $indexGoodsRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$indexGoods): $mod = ($i % 2 );++$i;?>
            <li class="opacity_img">
              <a href="<?php echo url('index/Goods/index', array('id'=>$indexGoods['id'])); ?>" target="_blank">
                <div class="p-img"><img src="/shop/public/static/uploads/<?php echo $indexGoods['mid_thumb']; ?>" alt="<?php echo $indexGoods['goods_name']; ?>"></div>
                <div class="p-name" title="<?php echo $indexGoods['goods_name']; ?>"><?php echo $indexGoods['goods_name']; ?></div>
                <div class="p-price">
                  <div class="shop-price">
                    <em>¥</em><?php echo $indexGoods['shop_price']; ?>
                  </div>
                  <div class="original-price"><?php echo $indexGoods['markte_price']; ?></div>
                </div>
              </a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <div class="spec" data-spec=""></div>
        </div>
      </div>
    </div>
  </div>
  <div class="attached-search-container" ectype="suspColumn">
    <div class="w w1200">
      <div class="categorys site-mast">
        <div class="categorys-type"><a href="categoryall.php" target="_blank">全部商品分类</a></div>
        <div class="categorys-tab-content">
          <div class="categorys-items" id="cata-nav">
            <div class="categorys-item" ectype="cateItem" data-id="858" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-ele"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=858" target="_blank">家用电器</a>
                  </strong>
                  <span>
                    <a href="category.php?id=1105" target="_blank">大家电</a>

                    <a href="category.php?id=1115" target="_blank">生活电器</a>




                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_858"></div>
                    <div class="cate_detail" ectype="subitems_858"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_858"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="3" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-digital"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=33" target="_blank" class="division_cat">手机</a>、<a
                      href="category.php?id=64" target="_blank" class="division_cat">数码</a>、<a href="category.php?id=37"
                                                                                               target="_blank"
                                                                                               class="division_cat">通信</a>
                  </strong>
                  <span>
                    <a href="category.php?id=112" target="_blank">智能设备</a>

                    <a href="category.php?id=76" target="_blank">数码配件</a>






                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_3"></div>
                    <div class="cate_detail" ectype="subitems_3"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_3"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="4" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-computer"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=4" target="_blank">电脑、办公</a>
                  </strong>
                  <span>
                    <a href="category.php?id=158" target="_blank">服务产品</a>

                    <a href="category.php?id=132" target="_blank">电脑整机</a>





                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_4"></div>
                    <div class="cate_detail" ectype="subitems_4"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_4"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="5" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-bed"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=5" target="_blank">家居、家具、家装、厨具</a>
                  </strong>
                  <span>
                    <a href="category.php?id=143" target="_blank">厨具</a>

                    <a href="category.php?id=159" target="_blank">家装建材</a>





                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_5"></div>
                    <div class="cate_detail" ectype="subitems_5"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_5"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="6" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-clothes"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=6" target="_blank">男装、女装、内衣</a>
                  </strong>
                  <span>
                    <a href="category.php?id=347" target="_blank">女装</a>

                    <a href="category.php?id=463" target="_blank">男装</a>




                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_6"></div>
                    <div class="cate_detail" ectype="subitems_6"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_6"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="8" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-shoes"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=8" target="_blank">鞋靴、箱包、钟表、奢侈品</a>
                  </strong>
                  <span>
                    <a href="category.php?id=362" target="_blank">奢侈品</a>

                    <a href="category.php?id=360" target="_blank">功能箱包</a>






                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_8"></div>
                    <div class="cate_detail" ectype="subitems_8"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_8"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="categorys-item" ectype="cateItem" data-id="860" data-eveval="0">
              <div class="item item-content">
                <i class="iconfont icon-heal"></i>
                <div class="categorys-title">
                  <strong>
                    <a href="category.php?id=860" target="_blank">个人化妆、清洁用品</a>
                  </strong>
                  <span>
                    <a href="category.php?id=876" target="_blank">面部护肤</a>

                    <a href="category.php?id=880" target="_blank">洗发护发</a>






                                    </span>
                </div>
              </div>
              <div class="categorys-items-layer" ectype="cateLayer">
                <div class="cate-layer-con clearfix">
                  <div class="cate-layer-left">
                    <div class="cate_channel" ectype="channels_860"></div>
                    <div class="cate_detail" ectype="subitems_860"></div>
                  </div>
                  <div class="cate-layer-rihgt" ectype="brands_860"></div>
                </div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="mall-search">
        <div class="dsc-search">
          <div class="form">
            <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"
                  class="search-form">
              <input autocomplete="off" name="keywords" type="text" id="keyword2" value="Five Plus"
                     class="search-text"/>
              <input type="hidden" name="store_search_cmt" value="0">
              <button type="submit" class="button button-goods" onclick="checkstore_search_cmt(0)">搜商品</button>
              <button type="submit" class="button button-store" onclick="checkstore_search_cmt(1)">搜店铺</button>
            </form>
          </div>
        </div>
      </div>
      <div class="suspend-login">
        <a href="user.php">登录</a>
        |
        <a href="user.php?act=register">注册</a>
      </div>
      <div class="shopCart" id="ECS_CARTINFO">

        <div class="shopCart-con dsc-cm">
          <a href="flow.php">
            <i class="iconfont icon-carts"></i>
            <span>我的购物车</span>
            <em class="count cart_num">0</em>
          </a>
        </div>
        <div class="dorpdown-layer" ectype="dorpdownLayer">
          <div class="prompt">
            <div class="nogoods"><b></b><span>购物车中还没有商品，赶紧选购吧！</span></div>
          </div>
        </div>

        <script type="text/javascript">
          function changenum(rec_id, diff, warehouse_id, area_id) {
            var cValue = $('#cart_value').val();
            var goods_number = Number($('#goods_number_' + rec_id).text()) + Number(diff);

            if (goods_number < 1) {
              return false;
            }
            else {
              change_goods_number(rec_id, goods_number, warehouse_id, area_id, cValue);
            }
          }

          function change_goods_number(rec_id, goods_number, warehouse_id, area_id, cValue) {
            if (cValue != '' || cValue == 'undefined') {
              var cValue = $('#cart_value').val();
            }
            Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id + '&goods_number=' + goods_number + '&cValue=' + cValue + '&warehouse_id=' + warehouse_id + '&area_id=' + area_id, change_goods_number_response, 'POST', 'JSON');
          }

          function change_goods_number_response(result) {
            var rec_id = result.rec_id;
            if (result.error == 0) {
              $('#goods_number_' + rec_id).val(result.goods_number);//更新数量
              $('#goods_subtotal_' + rec_id).html(result.goods_subtotal);//更新小计
              if (result.goods_number <= 0) {
                //数量为零则隐藏所在行
                $('#tr_goods_' + rec_id).style.display = 'none';
                $('#tr_goods_' + rec_id).innerHTML = '';
              }
              $('#total_desc').html(result.flow_info);//更新合计
              if ($('ECS_CARTINFO')) 

              if (result.group.length > 0) {
                for (var i = 0; i < result.group.length; i++) {
                  $("#" + result.group[i].rec_group).html(result.group[i].rec_group_number);//配件商品数量
                  $("#" + result.group[i].rec_group_talId).html(result.group[i].rec_group_subtotal);//配件商品金额
                }
              }

              $("#goods_price_" + rec_id).html(result.goods_price);
              $(".cart_num").html(result.subtotal_number);
            }
            else if (result.message != '') {
              $('#goods_number_' + rec_id).val(result.cart_Num);//更新数量
              alert(result.message);
            }
          }

          function deleteCartGoods(rec_id, index) {
            Ajax.call('delete_cart_goods.php', 'id=' + rec_id + '&index=' + index, deleteCartGoodsResponse, 'POST', 'JSON');
          }

          /**
           * 接收返回的信息
           */
          function deleteCartGoodsResponse(res) {
            if (res.error) {
              alert(res.err_msg);
            }
            else {
              $("#ECS_CARTINFO").html(res.content);
              $(".cart_num").html(res.cart_num);
            }
          }

          function return_cart_list(result) {
            $(".cart_num").html(result.cart_num);
            $(".pop_panel").html(result.content);
            tbplHeigth();
          }
        </script>
      </div>
    </div>
  </div>
  <div class="lift lift-mode-one lift-hide" ectype="lift" data-type="one" style="z-index:100001">
    <div class="lift-list" ectype="liftList">
      <div class="lift-item lift-h-seckill lift-item-first" ectype="liftItem" data-target="#h-seckill"><span>秒杀活动</span><i
          class="lift-arrow"></i></div>
    </div>
  </div>

  <input name="warehouse_id" type="hidden" value="1">
  <input name="area_id" type="hidden" value="7">
</div>

<div class="mui-mbar-tabs">
  <div class="quick_link_mian" data-userid="0">
    <div class="quick_links_panel">
      <div id="quick_links" class="quick_links">
        <ul>
          <li>
            <a href="user.php"><i class="setting"></i></a>
            <div class="ibar_login_box status_login">
              <div class="avatar_box">
                <p class="avatar_imgbox">
                  <img src="/shop/public/static/index/img/touxiang.jpg" width="100" height="100"/>
                </p>
                <ul class="user_info">
                  <li>用户名：暂无</li>
                  <li>级&nbsp;别：暂无</li>
                </ul>
              </div>
              <div class="login_btnbox">
                <a href="user.php?act=order_list" class="login_order">我的订单</a>
                <a href="user.php?act=collection_list" class="login_favorite">我的收藏</a>
              </div>
              <i class="icon_arrow_white"></i>
            </div>
          </li>

          <li id="shopCart">
            <a href="javascript:void(0);" class="cart_list">
              <i class="message"></i>
              <div class="span">购物车</div>
              <span class="cart_num">0</span>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_order"><i class="chongzhi"></i></a>
            <div class="mp_tooltip">
              <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">我的订单</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_yhq"><i class="yhq"></i></a>
            <div class="mp_tooltip">
              <font id="mpbtn_money" style="font-size:12px; cursor:pointer;">优惠券</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_total"><i class="view"></i></a>
            <div class="mp_tooltip" style=" visibility:hidden;">
              <font id="mpbtn_myMoney" style="font-size:12px; cursor:pointer;">我的资产</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_history"><i class="zuji"></i></a>
            <div class="mp_tooltip">
              <font id="mpbtn_histroy" style="font-size:12px; cursor:pointer;">我的足迹</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_collection"><i class="wdsc"></i></a>
            <div class="mp_tooltip">
              <font id="mpbtn_wdsc" style="font-size:12px; cursor:pointer;">我的收藏</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
          <li>
            <a href="javascript:void(0);" class="mpbtn_email"><i class="email"></i></a>
            <div class="mp_tooltip">
              <font id="mpbtn_email" style="font-size:12px; cursor:pointer;">邮箱订阅</font>
              <i class="icon_arrow_right_black"></i>
            </div>
          </li>
        </ul>
      </div>
      <div class="quick_toggle">
        <ul>
          <li>


            <a id="IM" IM_type="dsc" onclick="openWin(this)" href="javascript:;"><i class="kfzx"></i></a>
            <div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>

          </li>
          <li class="returnTop">
            <a href="javascript:void(0);" class="return_top"><i class="top"></i></a>
          </li>
        </ul>

      </div>
    </div>
    <div id="quick_links_pop" class="quick_links_pop"></div>
  </div>
</div>
<div class="email_sub">
  <div class="attached_bg"></div>
  <div class="w1200">
    <div class="email_sub_btn">
      <input type="input" id="user_email" name="user_email" autocomplete="off" placeholder="请输入您的邮箱帐号">
      <a href="javascript:void(0);" onClick="add_email_list();" class="emp_btn">订阅</a>
      <a href="javascript:void(0);" onClick="cancel_email_list();" class="emp_btn emp_cancel_btn">退订</a>
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


<div ectype="bonusadv_box"></div>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.yomi.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/cart_common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/cart_quick_links.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/dsc-common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/asyLoadfloor.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.purebox.js"></script>
<script type="text/javascript">
  /*首页轮播*/
  var slideType = $("*[data-mode='lunbo']").find("*[data-type='range']").data("slide");
  var length = $(".banner .bd").find("li").length;

  if (slideType == "roll") {
    slideType = "left";
  }

  if (length > 1) {
    $(".banner").slide({
      titCell: ".hd ul",
      mainCell: ".bd ul",
      effect: slideType,
      interTime: 5000,
      delayTime: 500,
      autoPlay: true,
      autoPage: true,
      trigger: "click",
      endFun: function (i, c, s) {
        $(window).resize(function () {
          var width = $(window).width();
          s.find(".bd li").css("width", width);
        });
      }
    });
  } else {
    $(".banner .hd").hide();
  }

  //首页信息栏 新闻文章切换
  $(".vip-item").slide({titCell: ".tit a", mainCell: ".con"});

  //楼层二级分类商品切换
  $("*[ectype='floorItem']").slide({
    titCell: ".hd-tags li",
    mainCell: ".floor-tabs-content",
    titOnClassName: "current"
  });

  $("*[ectype='floorItem']").slide({
    titCell: ".floor-nav li",
    mainCell: ".floor-tabs-content",
    titOnClassName: "current"
  });

  //第五套楼层模板
  $(".floor-fd-slide").slide({
    mainCell: ".bd ul",
    effect: "left",
    autoPlay: false,
    autoPage: true,
    vis: 4,
    scroll: 1,
    prevCell: ".ff-prev",
    nextCell: ".ff-next"
  });

  //第六套楼层模板
  $(".floor-brand").slide({
    mainCell: ".fb-bd ul",
    effect: "left",
    pnLoop: true,
    autoPlay: false,
    autoPage: true,
    vis: 3,
    scroll: 1,
    prevCell: ".fs_prev",
    nextCell: ".fs_next"
  });

  //楼层轮播图广告
  $("*[data-purebox='homeFloor']").each(function (index, element) {
    var f_slide_length = $(this).find(".floor-left-slide .bd li").length;
    if (f_slide_length > 1) {
      $(element).find(".floor-left-slide").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        effect: "left",
        interTime: 3500,
        delayTime: 500,
        autoPlay: true,
        autoPage: true
      });
    } else {
      $(element).find(".floor-left-slide .hd").hide();
    }
  });
  //异步加载出首页个人信息、秒杀活动、品牌信息、首页弹出广告
  $(function () {
    var site_domain = "";
    var brand_id = $('*[ectype="homeBrand"]').find(".brand-list").data("value");
    var where = '';
    if (!brand_id) {
      brand_id = '';
    }

    // if(site_domain){
    //   $.ajax({
    //     type: "GET",
    //     url: "ajax_dialog.php", /*jquery Ajax跨域*/
    //     data: "act=getUserInfo&is_jsonp=1&brand_id="+brand_id,
    //     dataType:"jsonp",
    //     jsonp:"jsoncallback",
    //     success: homeAjax
    //   });
    // }else{
    //   Ajax.call('ajax_dialog.php?act=getUserInfo', 'brand_id=' + brand_id, homeAjax , 'POST', 'JSON');
    // }
    ajax_Homeindex_Bonusadv();

    function ajax_Homeindex_Bonusadv() {
      var cfg_bonus_adv = "1";//是否开启首页弹出广告
      var suffix = "backup_tpl_1";

      if (cfg_bonus_adv == 1 && suffix) {
        // Ajax.call('ajax_dialog.php?act=ajax_Homeindex_Bonusadv', 'suffix=' + suffix, function(data){
        //   if(data.error != 1){
        //     $("[ectype='bonusadv_box']").html(data.content);
        //   }
        // } , 'POST', 'JSON');
      }
    }

    function homeAjax(data) {
      $("*[ectype='user_info']").html(data.content);
      $("*[ectype='homeBrand']").html(data.brand_list);

      if ($("*[data-mode='lunbo']").length > 0) {
        $("*[data-mode='lunbo']").after("<div class='visual-item w1200' ectype='channel'>" + data.seckill_goods + "</div>");
      } else {
        $(".content").find("*[ectype='visualItme']").eq(0).before("<div class='visual-item w1200' ectype='channel'>" + data.seckill_goods + "</div>");
      }
      $("*[ectype='time']").each(function () {
        $(this).yomi();
      });

      //秒杀活动
      var seckill_goods = $("input[name='seckill_goods']").val();
      if (seckill_goods == 0) {
        $(".lift-h-seckill").hide();
      } else {
        $(".lift-h-seckill").show();
      }

      //首页秒杀商品滚动
      $(".seckill-channel").slide({
        mainCell: ".box-bd ul",
        effect: "leftLoop",
        autoPlay: true,
        autoPage: true,
        interTime: 5000,
        delayTime: 500,
        vis: 5,
        scroll: 1,
        trigger: "click"
      });

      $.catetopLift();

      $(window).scroll(function () {
        var scrollTop = $(document).scrollTop();
        var navTop = $("*[ectype='channel']").offset().top;  //by yanxin

        if (scrollTop > navTop) {
          $("*[ectype='suspColumn']").addClass("show");
        } else {
          $("*[ectype='suspColumn']").removeClass("show");
        }
      });
    }

    //重新加载商品模块
    $("[data-mode='guessYouLike']").each(function () {
      var _this = $(this);
      var goods_ids = _this.data("goodsid");
      var warehouse_id = $("input[name='warehouse_id']").val();
      var area_id = $("input[name='area_id']").val();
      if (goods_ids) {
        // Ajax.call('ajax_dialog.php?act=getguessYouLike', 'goods_ids=' + goods_ids + "&warehouse_id=" + warehouse_id + "&area_id=" + area_id, function(data){
        //   if(data.content){
        //     _this.find(".view .lift-channel ul").html(data.content);
        //   }
        // } , 'POST', 'JSON');
      }
    });

    $("li[ectype='floor_cat_content'].current").each(function () {
      get_homefloor_cat_content(this);
    });

    $("[ectype='identi_floorgoods'].current").each(function () {
      get_homefloor_cat_content(this);
    });
    checked_article_cat();

    function checked_article_cat() {
      var cat_ids = '';
      $('[data-mode="insertVipEdit"] .tit a').each(function () {
        var val = $(this).data('catid');
        if (cat_ids) {
          cat_ids = cat_ids + "," + val;
        } else {
          cat_ids = val;
        }
      });
      if (cat_ids) {
        Ajax.call('ajax_dialog.php?act=checked_article_cat', 'cat_ids=' + cat_ids, function (data) {
          $('[data-mode="insertVipEdit"] .vip_article_cat').html(data.content);
        }, 'POST', 'JSON');
      }

    }
  });

  function readyLoad() {
    var homeWrap = $("*[ectype='homeWrap']");
    var homeitem = homeWrap.find("*[ectype='visualItme']");
    var mode = "";
    var range = "";
    var lift = "";
    var id = "";
    var floorItem = "";
    var liftObj = $("*[ectype='lift']");
    var returnTop = "";

    if (liftObj.data("type") == "one") {
      returnTop = '<div class="lift-item lift-item-top" ectype="liftItem"><i class="iconfont icon-returntop"></i></div>';
    } else {
      returnTop = '<div class="lift-item lift-item-top" ectype="liftItem">TOP<i class="iconfont icon-top-alt"></i></div>';
    }

    homeitem.each(function (k, v) {
      mode = $(this).data("mode");
      if (mode != "lunbo" && mode != "h-streamer" && mode != "custom") {
        range = $(this).find("*[data-type='range']");
        lift = range.data("lift");
        id = range.attr("id");

        var _div = '<div class="lift-item" ectype="liftItem" data-target="#' + id + '" title="' + lift + '"><span>' + lift + '</span><i class="lift-arrow"></i></div>';

        $("*[ectype='liftList']").append(_div);
      }

    });

    $("*[ectype='liftList']").append(returnTop);
  }

  readyLoad();

  //会员名称*号 by yanxin
  /*var name = $(".suspend-login a.nick_name").text();
  var star = new Array();
  var nameLen = name.length > 2 ? name.length-2:"1";
  for(var i=1;i<=nameLen;i++){
      star.push("*");
  }
  star = star.join("");
  if(name.length > 2){
      var new_name = name[0] + star + name[name.length-1];
  }else{
      var new_name = name[0] + star;
  }
  $(".suspend-login a.nick_name").text(new_name);
  */
  //去掉悬浮框 我的购物车
  $(".attached-search-container .shopCart-con a span").text("");

  $("*[ectype='time']").each(function () {
    $(this).yomi();
  });

  /*首页可视化 第八套模板 楼层左侧前后轮播 */
  aroundSilder(".floor_silder")
</script>

<script>
  var page = 0;
  var brand_url = "<?php echo url('index/brand/lst'); ?>";
  //加载页面时自动提交一个点击事件刷新出商品品牌图片
  $(function () {
    $('.refresh-btn').click();
  })
</script>
</body>
</html>