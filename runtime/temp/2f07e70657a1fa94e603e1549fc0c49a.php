<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"D:\phpStudy\WWW\shop/application/index\view\goods\goods.htm";i:1595341657;s:59:"D:\phpStudy\WWW\shop\application\index\view\common\head.htm";i:1594995753;s:60:"D:\phpStudy\WWW\shop\application\index\view\common\right.htm";i:1591505509;s:61:"D:\phpStudy\WWW\shop\application\index\view\common\footer.htm";i:1592318019;}*/ ?>
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="Keywords" content="童攀课堂-php课堂-www.tongpankt.com"/>
  <meta name="Description" content="童攀课堂-php课堂-www.tongpankt.com"/>
  <title>交流群：383432579</title>
  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/base.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/iconfont.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/purebox.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/quickLinks.css"/>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery.json.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/transport_jquery.js"></script>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/goods_fitting.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/suggest.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/js/calendar/calendar.min.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/js/perfect-scrollbar/perfect-scrollbar.min.css"/>
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
<div class="full-main-n">
  <div class="w w1200 relative">
    <div class="crumbs-nav">
      <div class="crumbs-nav-main clearfix">
        <div class="crumbs-nav-item">
          <div class="menu-drop">
            <div class="trigger">
              <a href="category.php?id=6"><span>男装、女装、内衣</span></a>
              <i class="iconfont icon-down"></i>
            </div>
            <div class="menu-drop-main">
              <ul>
                <li><a href="category.php?id=347">女装</a></li>
                <li><a href="category.php?id=463">男装</a></li>
                <li><a href="category.php?id=547">内衣</a></li>
                <li><a href="category.php?id=630">服饰配件</a></li>
                <li><a href="category.php?id=1442">运动户外</a></li>
              </ul>
            </div>
          </div>
          <i class="iconfont icon-right"></i></div>
        <div class="crumbs-nav-item">
          <div class="menu-drop">
            <div class="trigger">
              <a href="category.php?id=347"><span>女装</span></a>
              <i class="iconfont icon-down"></i>
            </div>
            <div class="menu-drop-main">
              <ul>
                <li><a href="category.php?id=349">连衣裙</a></li>
                <li><a href="category.php?id=350">蕾丝/雪纺衫</a></li>
                <li><a href="category.php?id=351">衬衫</a></li>
                <li><a href="category.php?id=352">T恤</a></li>
                <li><a href="category.php?id=354">半身裙</a></li>
                <li><a href="category.php?id=356">休闲裤</a></li>
                <li><a href="category.php?id=358">短裤</a></li>
                <li><a href="category.php?id=361">牛仔裤</a></li>
                <li><a href="category.php?id=363">针织衫</a></li>
                <li><a href="category.php?id=365">吊带/背心</a></li>
                <li><a href="category.php?id=367">打底衫</a></li>
                <li><a href="category.php?id=369">打底裤</a></li>
                <li><a href="category.php?id=370">正装裤</a></li>
                <li><a href="category.php?id=372">小西服</a></li>
                <li><a href="category.php?id=374">马甲</a></li>
                <li><a href="category.php?id=377">风衣</a></li>
                <li><a href="category.php?id=379">羊毛衫</a></li>
                <li><a href="category.php?id=381">羊绒衫</a></li>
                <li><a href="category.php?id=383">短外套</a></li>
                <li><a href="category.php?id=385">棉服</a></li>
                <li><a href="category.php?id=388">毛呢大衣</a></li>
                <li><a href="category.php?id=390">加绒裤</a></li>
                <li><a href="category.php?id=395">羽绒服</a></li>
                <li><a href="category.php?id=400">皮草</a></li>
                <li><a href="category.php?id=429">真皮皮衣</a></li>
                <li><a href="category.php?id=431">仿皮皮衣</a></li>
                <li><a href="category.php?id=444">旗袍/唐装</a></li>
                <li><a href="category.php?id=448">礼服</a></li>
                <li><a href="category.php?id=451">婚纱</a></li>
                <li><a href="category.php?id=454">中老年女装</a></li>
                <li><a href="category.php?id=455">大码女装</a></li>
              </ul>
            </div>
          </div>
          <i class="iconfont icon-right"></i></div>
        <div class="crumbs-nav-item">
          <div class="menu-drop">
            <div class="trigger bottom">
              <a href="category.php?id=350"><span>蕾丝/雪纺衫</span></a>
              <i class="iconfont icon-down"></i>
            </div>
          </div>
          <i class="iconfont icon-right"></i></div>
        <span class="cn-goodsName"><?php echo $goodsInfo['goods_name']; ?></span>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="w w1200">
    <div class="product-info">

      <!-- 相册开始 -->
      <div class="preview" if="preview">
        <div class="gallery_wrap"><a href="/shop/public/static/uploads/<?php echo $goodsInfo['og_thumb']; ?>" class="MagicZoomPlus" id="Zoomer"
                                     rel="hint-text: ; selectors-effect: false; selectors-class: img-hover; selectors-change: mouseover; zoom-distance: 10;zoom-width: 400; zoom-height: 474;"><img
            src="/shop/public/static/uploads/<?php echo $goodsInfo['big_thumb']; ?>" id="J_prodImg"
            alt="<?php echo $goodsInfo['goods_name']; ?>"></a></div>
        <div class="spec-list">
          <a href="javascript:void(0);" class="spec-prev"><i class="iconfont icon-left"></i></a>
          <div class="spec-items">
            <ul>
              <?php if(is_array($goodsPhotoRes) || $goodsPhotoRes instanceof \think\Collection || $goodsPhotoRes instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsPhotoRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$midphotos): $mod = ($i % 2 );++$i;?>
              <li>
                <a href="/shop/public/static/uploads/<?php echo $midphotos['og_photo']; ?>" rel="zoom-id: Zoomer"
                   rev="/shop/public/static/uploads/<?php echo $midphotos['big_photo']; ?>">
                  <img src="/shop/public/static/uploads/<?php echo $midphotos['mid_photo']; ?>"
                       alt="<?php echo $goodsInfo['goods_name']; ?>" width="58" height="58"/>
                </a>
              </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
          </div>
          <a href="javascript:void(0);" class="spec-next"><i class="iconfont icon-right"></i></a>
        </div>
      </div>
      <!-- 相册结束 -->
      <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=692785"></script>
      <script type="text/javascript" id="bdshell_js"></script>
      <script type="text/javascript">
        document.getElementById("bdshell_js").src = "https://test.dscmall.cn/static/api/js/share.js?v=89860593.js?cdnversion=" + new Date().getHours();
      </script>
      <script type="text/javascript">
        $(function () {
          get_collection();
        });

        function get_collection() {
          // Ajax.call('ajax_dialog.php', 'act=goods_collection&goods_id=' + 799, goodsCollectionResponse, 'GET', 'JSON');
        }

        function goodsCollectionResponse(res) {
          $("#collect_count").html(res.collect_count);

          if (res.is_collect > 0) {
            $(".collection").addClass('selected');
            $("#collection_iconfont").addClass("icon-collection-alt");
            $("#collection_iconfont").removeClass('icon-collection');
          } else {
            $(".collection").removeClass('selected');
            $("#collection_iconfont").addClass("icon-collection");
            $("#collection_iconfont").removeClass('icon-collection-alt');
          }
        }
      </script>
      <div class="product-wrap">
        <form action="javascript:addToCart(799)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
          <div class="name"><?php echo $goodsInfo['goods_name']; ?></div>
          <div class="summary">
            <div class="summary-price-wrap">
              <div class="s-p-w-wrap">
                <div class="summary-item si-shop-price">
                  <div class="si-tit">本 店 价</div>
                  <div class="si-warp">
                    <strong class="shop-price" id="ECS_SHOPPRICE" ectype="SHOP_PRICE">加载中...</strong>
                  </div>
                </div>

                <div class="summary-item si-market-price">
                  <div class="si-tit">市 场 价</div>
                  <div class="si-warp">
                    <div class="m-price" id="ECS_MARKETPRICE"><em>¥</em><?php echo $goodsInfo['markte_price']; ?></div>
                  </div>
                </div>
                <div class="si-info">
                  <div class="si-cumulative">累计评价<em>0</em></div>
                  <div class="si-cumulative">累计销量<em>0</em></div>
                </div>
                <div class="summary-item si-coupon">
                  <div class="si-tit">领 券</div>
                  <div class="si-warp">
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满2000减100<i class="i-right"></i></div>
                    </a>
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满1000减35<i class="i-right"></i></div>
                    </a>
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满10000减500<i class="i-right"></i></div>
                    </a>
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满10000减888<i class="i-right"></i></div>
                    </a>
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满50000减5888<i class="i-right"></i></div>
                    </a>
                    <a class="J-open-tb" href="#none" data-goodsid="799">
                      <div class="quan-item"><i class="i-left"></i>满10减500<i class="i-right"></i></div>
                    </a>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="summary-basic-info">
              <div class="summary-item is-integral">
                <div class="si-tit">可用积分</div>
                <div class="si-warp">可用 <span class="integral">0</span></div>
              </div>
              <!-- 单选属性开始 -->
              <?php if(is_array($radioArr) || $radioArr instanceof \think\Collection || $radioArr instanceof \think\Paginator): $i = 0; $__LIST__ = $radioArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <div class="summary-item is-integral">
                <div class="si-tit"><?php echo $vo[0]['attr_name'];?></div>
                <div class="si-warp">
                  <!--<label class="checkstatus"><input checked="checked" type="radio" class="color" value="黑色">黑色<i></i></label>-->
                  <?php if(is_array($vo) || $vo instanceof \think\Collection || $vo instanceof \think\Paginator): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr): $mod = ($i % 2 );++$i;?>
                  <label <?php if($i == 1): ?> class="checkstatus"<?php endif; ?>><input <?php if($i == 1): ?> checked="checked" <?php endif; ?> type="radio" name="attr_<?php echo $attr['attr_id']; ?>" value="<?php echo $attr['id']; ?>"><?php echo $attr['attr_value']; if($attr['attr_price'] > 0): ?>[加<?php echo $attr['attr_price']; ?>钱]<?php endif; if($attr['attr_price'] < 0): ?>[减<?php echo $attr['attr_price']*-1; ?>钱]<?php endif; ?><i></i></label>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
              </div>
              <?php endforeach; endif; else: echo "" ;endif; ?>
              <!-- 单选属性结束 -->

              <!-- 选中只有checked的元素 -->
              <script type="text/javascript">
                // 申明一个数组  
                var goods_attr_ids = new Array();
                $(":checked").each(function() {
                  // 使用push方法,放到goods_attr_ids数组中
                  goods_attr_ids.push($(this).val());
                });
                goods_attr_ids = goods_attr_ids.toString();
                console.log(goods_attr_ids);
              </script>
              <div class="summary-item is-number">
                <div class="si-tit">数量</div>
                <div class="si-warp">
                  <div class="amount-warp">
                    <input class="text buy-num" ectype="quantity" value="1" name="number" defaultnumber="1">
                    <div class="a-btn">
                      <a href="javascript:void(0);" class="btn-add" ectype="btnAdd"><i class="iconfont icon-up"></i></a>
                      <a href="javascript:void(0);" class="btn-reduce btn-disabled" ectype="btnReduce"><i
                          class="iconfont icon-down"></i></a>
                      <input type="hidden" name="perNumber" id="perNumber" ectype="perNumber" value="0">
                      <input type="hidden" name="perMinNumber" id="perMinNumber" ectype="perMinNumber" value="1">
                    </div>
                    <input name="confirm_type" id="confirm_type" type="hidden" value="3"/>
                  </div>
                  <span>库存&nbsp;<em id="goods_attr_num" ectype="goods_attr_num"></em>&nbsp;个</span>
                </div>
              </div>
              <div class="clear"></div>
            </div>
            <div class="choose-btns ml60 clearfix">
              <a href="javascript:bool=0;addToCart(799)" data-type="0" class="btn-buynow" ectype="btn-buynow">立即购买</a>
              <a href="javascript:bool=0;addToCartShowDiv(799)" class="btn-append" ectype="btn-append"><i
                  class="iconfont icon-carts"></i>加入购物车</a>


            </div>
            <div class="summary-basic-info">
              <div class="summary-item is-service">
                <div class="si-tit">温馨提示</div>
                <div class="si-warp gray">
                  ·不支持退换货服务
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" value="62" id="user_id" name="user_id"/>
          <input type="hidden" value="799" id="good_id" name="good_id"/>
          <input type="hidden" value="2" id="region_id" name="region_id"/>
          <input type="hidden" value="16" id="area_id" name="area_id"/>
          <input type="hidden" value="0" name="street_list"/>
          <input type="hidden" value="0" name="restrictShop" ectype="restrictShop"/>
          <input type="hidden" value="1" name="add_shop_price" ectype="add_shop_price"/>
        </form>
      </div>
      <div class="track">
        <div class="track_warp">
          <div class="track-tit"><h3>看了又看</h3><span></span></div>
          <div class="track-con" style="height: 450px;">
            <ul>
              <li>
                <div class="p-img"><a href="goods.php?id=635" target="_blank"
                                      title="韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102950633.jpg" width="140" height="140"></a></div>
                <div class="p-name"><a href="goods.php?id=635" target="_blank"
                                       title="韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服">韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠
                  朴信惠同款 黑白拼接 插肩袖 棒球服</a></div>
                <div class="price">
                  <em>¥</em>450.00
                </div>
              </li>
              <li>
                <div class="p-img"><a href="goods.php?id=634" target="_blank"
                                      title="新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489102753231.jpg" width="140" height="140"></a></div>
                <div class="p-name"><a href="goods.php?id=634" target="_blank" title="新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮">新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮</a>
                </div>
                <div class="price">
                  <em>¥</em>300.00
                </div>
              </li>
              <li>
                <div class="p-img"><a href="goods.php?id=864" target="_blank"
                                      title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490211620029.jpg" width="140" height="140"></a></div>
                <div class="p-name"><a href="goods.php?id=864" target="_blank"
                                       title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品">马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t
                  7002 立体3D绣花 欧美潮流范 17春装新品</a></div>
                <div class="price">
                  <em>¥</em>128.00
                </div>
              </li>
              <li>
                <div class="p-img"><a href="goods.php?id=785" target="_blank"
                                      title="森马夹克 2016冬装新款男士飞行夹克贴布绣立领休闲外套韩版潮流"><img
                    src="/shop/public/static/index/img/0_thumb_G_1490174208112.jpg" width="140" height="140"></a></div>
                <div class="p-name"><a href="goods.php?id=785" target="_blank" title="森马夹克 2016冬装新款男士飞行夹克贴布绣立领休闲外套韩版潮流">森马夹克
                  2016冬装新款男士飞行夹克贴布绣立领休闲外套韩版潮流</a></div>
                <div class="price">
                  <em>¥</em>199.90
                </div>
              </li>
              <li>
                <div class="p-img"><a href="goods.php?id=625" target="_blank" title="秋季新款男士套头卫衣印花外套韩版简约百搭潮流男生上衣服"><img
                    src="/shop/public/static/index/img/0_thumb_G_1489099437211.jpg" width="140" height="140"></a></div>
                <div class="p-name"><a href="goods.php?id=625" target="_blank" title="秋季新款男士套头卫衣印花外套韩版简约百搭潮流男生上衣服">秋季新款男士套头卫衣印花外套韩版简约百搭潮流男生上衣服</a>
                </div>
                <div class="price">
                  <em>¥</em>120.00
                </div>
              </li>
            </ul>
          </div>
          <div class="track-more">
            <a href="javascript:void(0);" class="sprite-up"><i class="iconfont icon-up"></i></a>
            <a href="javascript:void(0);" class="sprite-down"><i class="iconfont icon-down"></i></a>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>


    <div class="goods-main-layout">
      <div class="g-m-left">


        <div class="g-main g-rank">
          <div class="mc">
            <ul class="mc-tab" ectype="rankMcTab">
              <li class="curr">新品</li>
              <li>推荐</li>
              <li>热销</li>
            </ul>
            <div class="mc-content">


              <div class="mc-main" style="display:block;">
                <div class="mcm-left">
                  <div class="spirit"></div>
                  <div class="rank-number rank-number1">1</div>
                  <div class="rank-number rank-number2">2</div>
                  <div class="rank-number rank-number3">3</div>
                </div>
                <div class="mcm-right">
                  <ul>
                    <li>
                      <div class="p-img"><a href="goods.php?id=864"
                                            title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211620029.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=864"
                                             title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品">马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t
                        7002 立体3D绣花 欧美潮流范 17春装新品</a></div>
                      <div class="p-price">
                        <em>¥</em>128.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211575591.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98">马克华菲长袖T恤男
                        冬季新品纯棉圆领黑白潮款印花休闲t恤 98</a></div>
                      <div class="p-price">
                        <em>¥</em>98.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=865"
                                            title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211700709.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=865"
                                             title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购">美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款
                        1元秒100元优惠券丨限量抢丨立即抢购</a></div>
                      <div class="p-price">
                        <em>¥</em>89.00
                      </div>
                    </li>
                  </ul>
                </div>
              </div>


              <div class="mc-main" style="display:block;">
                <div class="mcm-left">
                  <div class="spirit"></div>
                  <div class="rank-number rank-number1">1</div>
                  <div class="rank-number rank-number2">2</div>
                  <div class="rank-number rank-number3">3</div>
                </div>
                <div class="mcm-right">
                  <ul>
                    <li>
                      <div class="p-img"><a href="goods.php?id=864"
                                            title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211620029.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=864"
                                             title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品">马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t
                        7002 立体3D绣花 欧美潮流范 17春装新品</a></div>
                      <div class="p-price">
                        <em>¥</em>128.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211575591.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98">马克华菲长袖T恤男
                        冬季新品纯棉圆领黑白潮款印花休闲t恤 98</a></div>
                      <div class="p-price">
                        <em>¥</em>98.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=865"
                                            title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211700709.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=865"
                                             title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购">美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款
                        1元秒100元优惠券丨限量抢丨立即抢购</a></div>
                      <div class="p-price">
                        <em>¥</em>89.00
                      </div>
                    </li>
                  </ul>
                </div>
              </div>


              <div class="mc-main" style="display:block;">
                <div class="mcm-left">
                  <div class="spirit"></div>
                  <div class="rank-number rank-number1">1</div>
                  <div class="rank-number rank-number2">2</div>
                  <div class="rank-number rank-number3">3</div>
                </div>
                <div class="mcm-right">
                  <ul>
                    <li>
                      <div class="p-img"><a href="goods.php?id=864"
                                            title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211620029.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=864"
                                             title="马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t 7002 立体3D绣花 欧美潮流范 17春装新品">马克华菲长袖T恤男士圆领修身韩版刺绣纯棉2017春装新款潮t
                        7002 立体3D绣花 欧美潮流范 17春装新品</a></div>
                      <div class="p-price">
                        <em>¥</em>128.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211575591.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=863" title="马克华菲长袖T恤男 冬季新品纯棉圆领黑白潮款印花休闲t恤   98">马克华菲长袖T恤男
                        冬季新品纯棉圆领黑白潮款印花休闲t恤 98</a></div>
                      <div class="p-price">
                        <em>¥</em>98.00
                      </div>
                    </li>
                    <li>
                      <div class="p-img"><a href="goods.php?id=865"
                                            title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购"><img
                          src="/shop/public/static/index/img/0_thumb_G_1490211700709.jpg" width="130" height="130"></a></div>
                      <div class="p-name"><a href="goods.php?id=865"
                                             title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购">美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款
                        1元秒100元优惠券丨限量抢丨立即抢购</a></div>
                      <div class="p-price">
                        <em>¥</em>89.00
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>


        <div class="g-main g-history">
          <div class="mt">
            <h3>最近浏览</h3>
            <a onclick="clear_history()" class="clear_history ftx-05 fr mt10 mr10" href="javascript:void(0);">清空</a>
          </div>
          <div class="mc">
            <div class="mc-warp" id="history_list" ectype="history_mian">
              <ul>
                <li>
                  <div class="p-img"><a href="goods.php?id=799" target="_blank"
                                        title="韩美格2017春秋新款修身大码蕾丝网纱打底衫女长袖薄款圆领女T恤 全店商品 二件减5元 三件减10"><img
                      src="/shop/public/static/index/img/0_thumb_G_1490174858999.jpg" width="170" height="170"></a></div>
                  <div class="p-name"><a href="goods.php?id=799" target="_blank">韩美格2017春秋新款修身大码蕾丝网纱打底衫女长袖薄款圆领女T恤 全店商品
                    二件减5元 三件减10</a></div>
                  <div class="p-lie">
                    <div class="p-price">
                      <em>¥</em>68.00
                    </div>
                  </div>
                </li>
                <li>
                  <div class="p-img"><a href="goods.php?id=626" target="_blank"
                                        title="秋冬新款加绒圆领套头卫衣男青年男生韩版潮流学生休闲外套男"><img
                      src="/shop/public/static/index/img/0_thumb_G_1489099544749.jpg" width="170" height="170"></a></div>
                  <div class="p-name"><a href="goods.php?id=626" target="_blank">秋冬新款加绒圆领套头卫衣男青年男生韩版潮流学生休闲外套男</a></div>
                  <div class="p-lie">
                    <div class="p-price">
                      <em>¥</em>168.00
                    </div>
                  </div>
                </li>
                <li>
                  <div class="p-img"><a href="goods.php?id=865" target="_blank"
                                        title="美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款 1元秒100元优惠券丨限量抢丨立即抢购"><img
                      src="/shop/public/static/index/img/0_thumb_G_1490211700709.jpg" width="170" height="170"></a></div>
                  <div class="p-name"><a href="goods.php?id=865" target="_blank">美特斯邦威长袖T恤男士2017春装新款时尚印花百搭205064商场同款
                    1元秒100元优惠券丨限量抢丨立即抢购</a></div>
                  <div class="p-lie">
                    <div class="p-price">
                      <em>¥</em>89.00
                    </div>
                  </div>
                </li>
                <li>
                  <div class="p-img"><a href="goods.php?id=775" target="_blank"
                                        title="韩都衣舍2017韩版女装春装新款条纹显瘦百搭宽松v领七分袖衬衫潮 领券立减/单件包邮/七天无理由退换"><img
                      src="/shop/public/static/index/img/0_thumb_G_1490169281436.jpg" width="170" height="170"></a></div>
                  <div class="p-name"><a href="goods.php?id=775" target="_blank">韩都衣舍2017韩版女装春装新款条纹显瘦百搭宽松v领七分袖衬衫潮
                    领券立减/单件包邮/七天无理由退换</a></div>
                  <div class="p-lie">
                    <div class="p-price">
                      <em>¥</em>78.00
                    </div>
                  </div>
                </li>
                <li>
                  <div class="p-img"><a href="goods.php?id=768" target="_blank"
                                        title="韩都衣舍2017韩版女装夏装新款时尚修身显瘦圆领条纹T恤OGY7711娋 显瘦版型 舒适面料 条纹元素"><img
                      src="/shop/public/static/index/img/0_thumb_G_1490169030833.jpg" width="170" height="170"></a></div>
                  <div class="p-name"><a href="goods.php?id=768" target="_blank">韩都衣舍2017韩版女装夏装新款时尚修身显瘦圆领条纹T恤OGY7711娋
                    显瘦版型 舒适面料 条纹元素</a></div>
                  <div class="p-lie">
                    <div class="p-price">
                      <em>¥</em>88.00
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>


      </div>
      <div class="g-m-detail">
        <div class="gm-tabbox" ectype="gm-tabs">
          <ul class="gm-tab">
            <li class="curr" ectype="gm-tab-item">商品详情</li>
            <li ectype="gm-tab-item">用户评论（<em class="ReviewsCount">0</em>）</li>
          </ul>
          <div class="gm-tab-qp-bort" ectype="qp-bort"></div>
        </div>
        <div class="gm-floors" ectype="gm-floors">
          <div class="gm-f-item gm-f-details" ectype="gm-item">
            <div class="gm-title">
              <h3>商品详情</h3>
            </div>
            <div class="goods-para-list">
              <dl class="goods-para">
                <?php if(is_array($uniArr) || $uniArr instanceof \think\Collection || $uniArr instanceof \think\Paginator): $i = 0; $__LIST__ = $uniArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <dd class="column"><span><?php echo $vo['attr_name']; ?>: <?php echo $vo['attr_value']; ?></span></dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </dl>

            </div>

          </div>
          <div class="gm-f-item gm-f-comment" ectype="gm-item">
            <div class="gm-title">
              <h3>评论晒单</h3>
              <ul class="gm-f-tab" ectype="gmf-tab">
                <li class="curr" rev="0"><a href="javascript:;">全部<em>(0)</em></a></li>
                <li rev="1"><a href="javascript:;">好评<em>(0)</em></a></li>
                <li rev="2"><a href="javascript:;">中评<em>(0)</em></a></li>
                <li rev="3" class="last"><a href="javascript:;">差评<em>(0)</em></a></li>
              </ul>
            </div>
            <div class="gm-warp">
              <div class="praise-rate-warp">
                <div class="rate">
                  <strong>100</strong>
                  <span class="rate-span">
    <span class="tit">好评率</span>
    <span class="bf">%</span>
</span>
                </div>
                <div class="actor-new">
                  <div class="not_impression">此商品还没有设置买家印象，陪我一起等下嘛~</div>
                </div>
              </div>
              <div class="com-list-main">

                <div id="ECS_COMMENT">
                  <div class="no_records no_comments_qt">
                    <i class="no_icon no_icon_three"></i>
                    <span class="block">暂无评价</span>
                  </div>
                  <!-- ajax异步获取本店价格 -->
                  <script>
                    var goods_id = <?php echo $goodsInfo['id']; ?>;
                    $.ajax({
                      type: "post",
                      url: "<?php echo url('index/goods/ajaxGetMemberPrice'); ?>",
                      dataType: 'json',
                      data:{goods_id:goods_id},
                      success: function (data) {
                        $('#ECS_SHOPPRICE').text(data);
                      }
                    });
                  </script>
                  <!-- 点击切换商品单选属性 -->
                  <script>
                    $('.si-warp label').click(function () {
                      $(this).addClass('checkstatus').siblings().removeClass('checkstatus');
                      $(this).children('input').attr('checked',true);
                      $(this).siblings().children('input').attr('checked',false);
                      return false;
                    });
                  </script>
                  <script type="text/javascript">
                    $(function () {
                      $("*[ectype='replySubmit']").click(function () {
                        var T = $(this);
                        var comment_id = T.data("value");
                        var reply_content = $("#reply_content" + comment_id).val();
                        var user_id = $("#comment_user" + comment_id).val();
                        var goods_id = $("#comment_goods" + comment_id).val();

                        if (reply_content == '') {
                          $("#reply-error" + comment_id).html(json_languages.please_message_input);
                          return false;
                        }

                        Ajax.call('comment.php', 'act=comment_reply&comment_id=' + comment_id + '&reply_content=' + reply_content + '&goods_id=' + goods_id + '&user_id=' + user_id, commentReplyResponse, 'POST', 'JSON');
                      });

                      $('.comment_nice').click(function () {
                        var T = $(this);
                        var comment_id = T.data('commentid');
                        var goods_id = T.data('idvalue');
                        var type = 'comment';

                        Ajax.call('comment.php', 'act=add_useful&id=' + comment_id + '&goods_id=' + goods_id + '&type=' + type, niceResponse, 'GET', 'JSON');
                      });
                    });

                    function commentReplyResponse(res) {
                      if (res.err_no == 1) {
                        var back_url = res.url;
                        $.notLogin("get_ajax_content.php?act=get_login_dialog", back_url);
                        return false;
                      } else if (res.err_no == 2) {
                        $("#reply-error" + res.comment_id).html(json_languages.been_evaluated);
                      } else {
                        $("#reply-error" + res.comment_id).html(json_languages.Add_success);
                        $("#reply_content" + res.comment_id).val('');
                        $("#reply-textarea" + res.comment_id).addClass('hide');
                        $(".reply-count").addClass('red');
                      }
                      $(".comment-reply" + res.comment_id).html(res.content);
                      $(".reply-count" + res.comment_id).html(res.reply_count);
                    }

                    function niceResponse(res) {
                      if (res.err_no == 1) {
                        var back_url = res.url;
                        $.notLogin("get_ajax_content.php?act=get_login_dialog", back_url);
                        return false;
                      } else if (res.err_no == 0) {
                        $(".reply-nice" + res.id).html(res.useful);
                        $(".comment_nice").addClass("selected");
                      }
                    }
                  </script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="rection">
        <div class="ftit"><h3>猜你喜欢</h3></div>
        <ul>
          <li>
            <div class="p-img"><a href="goods.php?id=684" target="_blank"><img
                src="/shop/public/static/index/img/0_thumb_G_1489109583798.jpg" width="134" height="134"></a></div>
            <div class="p-name"><a href="goods.php?id=684" target="_blank">【情侣款】Camel骆驼男靴 时尚潮流英伦风马丁靴高帮皮靴 爆卖1万双！ 情侣马丁靴
              好评如潮</a></div>
            <div class="p-price"><em>¥</em>555.00</div>
          </li>
          <li>
            <div class="p-img"><a href="goods.php?id=685" target="_blank"><img
                src="/shop/public/static/index/img/0_thumb_G_1489109633806.jpg" width="134" height="134"></a></div>
            <div class="p-name"><a href="goods.php?id=685" target="_blank">春季马丁靴男真皮男靴黄靴工装军靴韩版短靴沙漠靴高帮男鞋大黄靴 头层牛皮</a></div>
            <div class="p-price"><em>¥</em>1000.00</div>
          </li>
          <li>
            <div class="p-img"><a href="goods.php?id=679" target="_blank"><img
                src="/shop/public/static/index/img/0_thumb_G_1489108999364.jpg" width="134" height="134"></a></div>
            <div class="p-name"><a href="goods.php?id=679" target="_blank">特步女鞋2017春季新款运动鞋休闲鞋女慢跑步鞋旅游鞋轻便舒适时尚 早春特惠 爆款休闲女鞋
              赠运费险</a></div>
            <div class="p-price"><em>¥</em>200.00</div>
          </li>
          <li>
            <div class="p-img"><a href="goods.php?id=634" target="_blank"><img
                src="/shop/public/static/index/img/0_thumb_G_1489102753231.jpg" width="134" height="134"></a></div>
            <div class="p-name"><a href="goods.php?id=634" target="_blank">新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮</a></div>
            <div class="p-price"><em>¥</em>300.00</div>
          </li>
          <li>
            <div class="p-img"><a href="goods.php?id=683" target="_blank"><img
                src="/shop/public/static/index/img/0_thumb_G_1489109337889.jpg" width="134" height="134"></a></div>
            <div class="p-name"><a href="goods.php?id=683" target="_blank">igtt铝框行李箱拉杆箱旅行箱万向轮男女20/24/26寸密码箱登机箱子 铝合金框
              加强密码锁 万向轮 终身保修</a></div>
            <div class="p-price"><em>¥</em>330.00</div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="hidden">

    <div id="notify_box" class="hide">
      <div class="sale-notice">
        <div class="prompt">一旦商品在30日内降价，您将收到邮件、短信和手机推送消息！通过手机客户端消息提醒，购买更便捷~</div>
        <div class="user-form foreg-form">
          <div class="form-row">
            <div class="form-label"><em class="red">*</em>价格低于：</div>
            <div class="form-value">
              <input type="text" id="price-notice" name="price-notice" class="form-input w120 fl">
              <div class="notic">时，通知我</div>
              <div class="error"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label"><em class="red">*</em>手机号码：</div>
            <div class="form-value">
              <input type="text" class="form-input" id="cellphone" name="cellphone">
              <div class="error"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-label"><em class="red">*</em>邮箱地址：</div>
            <div class="form-value">
              <input type="text" class="form-input" id="user_email_notice" name="email">
              <div class="error"></div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="ecsc-cart-popup" id="addtocartdialog">
      <div class="loading-mask"></div>
      <div class="loading">
        <div class="center_pop_txt">
          <div class="title"><h3>提示</h3><a href="javascript:loadingClose();" title="关闭" class="loading-x">X</a></div>
        </div>
        <div class="btns">
          <a href="flow.php" class="ecsc-btn-mini ecsc-btn-orange">去付款</a>
          <a href="javascript:loadingClose();" class="ecsc-btn-mini">继续购物</a>
        </div>
      </div>
    </div>
  </div>


  <div class="duibi_box" id="slideTxtBox">
    <div class="parWarp">
      <div class="parTit">对比栏</div>
      <div class="parBd">
        <div class="slideBox5" id="duibilan">
          <div id="diff-items" class="diff-items clearfix">
            <dl class="hasItem" id="compare_goods1">
              <dt><h1>1</h1></dt>
              <dd><span class="ts">您还可以继续添加</span></dd>
            </dl>
            <dl class="hasItem" id="compare_goods2">
              <dt><h1>2</h1></dt>
              <dd><span class="ts">您还可以继续添加</span></dd>
            </dl>
            <dl class="hasItem" id="compare_goods3">
              <dt><h1>3</h1></dt>
              <dd><span class="ts">您还可以继续添加</span></dd>
            </dl>
            <dl class="hasItem" id="compare_goods4">
              <dt><h1>4</h1></dt>
              <dd><span class="ts">您还可以继续添加</span></dd>
            </dl>
          </div>
          <div class="diff-operate">
            <a id="compare_button" class="compare-active"></a>
            <a id="qingkong" class="del-items">清空对比栏</a>
            <a href="javascript:;" class="hide-me" ectype="db_hide">隐藏</a>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="tm-dl-overlay tm-dl-overlay-hidden">
    <a href="javascript:void('close')" class="tm-dl-overlay-close"><b></b><i></i></a>
    <div class="tm-dl-overlay-content"></div>
  </div>
  <div class="tm-dl-overlay-mask"></div>
</div>
<div class="mui-mbar-tabs">
  <div class="quick_link_mian" data-userid="62">
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
                  <li>用户名：86913361-232247</li>
                  <li>级&nbsp;别：铜牌</li>
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
              <span class="cart_num">1</span>
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
<script type="text/javascript" src="/shop/public/static/index/js/jquery.yomi.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/compare.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/cart_common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/magiczoomplus.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/cart_quick_links.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/calendar.php?lang="></script>
<script type="text/javascript" src="/shop/public/static/index/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/dsc-common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.purebox.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/goodsFittings.js"></script>

<script type="text/javascript">
  //商品详情
  goods_desc_floor();

  //商品相册小图滚动
  $(".spec-list").slide({
    mainCell: ".spec-items ul",
    effect: "left",
    trigger: "click",
    pnLoop: false,
    autoPage: true,
    scroll: 1,
    vis: 5,
    prevCell: ".spec-prev",
    nextCell: ".spec-next"
  });

  //右侧看了又看上下滚动
  $(".track_warp").slide({
    mainCell: ".track-con ul",
    effect: "top",
    pnLoop: false,
    autoPlay: false,
    autoPage: true,
    prevCell: ".sprite-up",
    nextCell: ".sprite-down",
    vis: 3
  });

  //商品搭配切换
  $(".combo-inner").slide({titCell: ".tab-nav li", mainCell: ".tab-content", titOnClassName: "curr", trigger: "click"});

  //商品搭配 多个商品滚动切换
  $(".combo-items").slide({
    mainCell: ".combo-items-warp ul",
    effect: "left",
    pnLoop: false,
    autoPlay: false,
    autoPage: true,
    prevCell: ".o-prev",
    nextCell: ".o-next",
    vis: 4
  });

  //左侧新品 热销 推荐排行切换
  $(".g-rank").slide({titCell: ".mc-tab li", mainCell: ".mc-content", titOnClassName: "curr", trigger: "click"});


  //全局变量
  var seller_id = 0;
  var goods_id = 799;
  var goodsId = 799;
  var goodsattr_style = 1;
  var gmt_end_time = 0;
  var now_time = 1507503012;
  var isReturn = false;
  $(function () {

    if (seller_id > 0) {
      goods_collect_store(seller_id);
    }

    //对比默认加载
    Compare.init();
  });

  /******************************************* js方法 start***********************************************/

  var add_shop_price = $("*[ectype='add_shop_price']").val();

  /* 点击可选属性或改变数量时修改商品价格的函数 */
  function changePrice(onload) {
    var qty = $("*[ectype='quantity']").val();
    var goods_attr_id = '';
    var goods_attr = '';
    var attr_id = '';
    var attr = '';

    goods_attr_id = getSelectedAttributes(document.forms['ECS_FORMBUY']);

    if (onload != 'onload') {
      if (add_shop_price == 0) {
        attr_id = getSelectedAttributesGroup(document.forms['ECS_FORMBUY']);
        goods_attr = '&goods_attr=' + attr_id;
      }
      Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + goods_attr_id + goods_attr + '&number=' + qty + '&warehouse_id=' + 2 + '&area_id=' + 16, changePriceResponse, 'GET', 'JSON');
    } else {
      if (add_shop_price == 1) {
        attr = '&attr=' + goods_attr_id;
      }
      Ajax.call('goods.php', 'act=price&id=' + goodsId + attr + '&number=' + qty + '&warehouse_id=' + 2 + '&area_id=' + 16 + '&onload=' + onload, changePriceResponse, 'GET', 'JSON');
    }
  }

  /* 接收返回的信息 回调函数 */
  function changePriceResponse(res) {
    if (res.err_msg.length > 0) {
      pbDialog(res.err_msg, " ", 0, 450, 80, 50);
    } else {
      //商品条形码
      if ($("#bar_code").length > 0) {
        if (res.bar_code) {
          $("#bar_code").html(res.bar_code);
          $("#bar_code").parents(".bar_code").removeClass("hide");
        } else {
          $("#bar_code").parents(".bar_code").addClass("hide");
        }
      }

      $("#cost-price").html(res.marketPrice_amount);

      //更新库存
      if ($("*[ectype='goods_attr_num']").length > 0) {
        $("*[ectype='goods_attr_num']").html(res.attr_number);
        $("*[ectype='perNumber']").val(res.attr_number);
      }

      //更新已购买数量
      if ($("#orderG_number").length > 0) {
        $("#orderG_number").html(res.orderG_number);
      }

      if ($("#ECS_SHOPPRICE").length > 0) {
        //市场价
        if ($("#ECS_MARKETPRICE").length > 0) {
          $("#ECS_MARKETPRICE").html(res.result_market);
        }

        //商品价格
        if (res.onload == 'onload') {
          $("*[ectype='SHOP_PRICE']").html(res.result);
        } else {
          if (add_shop_price == 1) {
            $("*[ectype='SHOP_PRICE']").html(res.result);
          } else {
            if (res.show_goods == 1) {
              $("*[ectype='SHOP_PRICE']").html(res.spec_price);
            } else {
              $("*[ectype='SHOP_PRICE']").html(res.result);
            }
          }
        }

        //搭配 套餐价
        var combo_shop = document.getElementsByName('combo_shopPrice[]');
        var combo_mark = document.getElementsByName('combo_markPrice[]');

        for (var i = 0; i < combo_shop.length; i++) {
          combo_shop[i].innerHTML = res.shop_price;
        }

        for (var i = 0; i < combo_mark.length; i++) {
          combo_mark[i].innerHTML = res.market_price;
        }
      }

      if (res.err_no == 2) {
        $("#isHas_warehouse_num").html(json_languages.shiping_prompt);
      } else {
        var isHas;
        var is_shipping = Number($("#is_shipping").val());

        if ($("#isHas_warehouse_num").length > 0) {
          if ((res.attr_number > 0 || add_shop_price == 0) && (res.attr_number > 0 || res.original_spec_price == res.original_shop_price) && (1 != 0 || is_shipping == 1)) {
            $("a[ectype='btn-append']").attr('href', 'javascript:addToCartShowDiv(799)').removeClass('btn_disabled');
            $("a[ectype='btn-buynow']").attr('href', 'javascript:addToCart(799)').removeClass('btn_disabled');
            $("a[ectype='byStages']").removeClass('btn_disabled');
            $('a').remove('#quehuo');
            isHas = '<strong>' + json_languages.Have_goods + '</strong>，' + json_languages.Deliver_back_order;

            $("a[ectype='btn-buynow']").show();
            $("a[ectype='btn-append']").show();
            $("a[ectype='byStages']").show();
          } else {
            isHas = '<strong>' + json_languages.No_goods + '</strong>，' + json_languages.goods_over;

            $("a[ectype='btn-buynow']").attr('href', 'javascript:void(0)').addClass('btn_disabled');
            $("a[ectype='btn-append']").attr('href', 'javascript:void(0)').addClass('btn_disabled');
            $("a[ectype='byStages']").addClass('btn_disabled');

            if (!document.getElementById('quehuo')) {
              if (1 != 0 || is_shipping == 1) {
                $("a[ectype='btn-buynow']").hide();
                $("a[ectype='btn-append']").hide();
                $("a[ectype='byStages']").hide();
                $('.choose-btns').append('<a id="quehuo" class="btn-buynow" href="javascript:addToCart(799);">暂时缺货</a>');
              }
            }
          }

          if (res.store_type == 1) {
            $("[ectype='btn-store-pick']").show();
            $("[ectype='list-store-pick']").show();
          } else {
            $("[ectype='btn-store-pick']").hide();
            $("[ectype='list-store-pick']").hide();
          }
          if (is_shipping == 0) {
            isHas = '<strong>' + json_languages.Have_goods + '</strong>，' + json_languages.shiping_prompt;
          }

          $("#isHas_warehouse_num").html(isHas);
        }
      }

      if (res.fittings_interval) {
        for (var i = 0; i < res.fittings_interval.length; i++) {
          $("#m_goods_" + res.fittings_interval[i].groupId).html(res.fittings_interval[i].fittings_minMax);
          $("#m_goods_save_" + res.fittings_interval[i].groupId).html(res.fittings_interval[i].save_minMaxPrice);
          $("#m_goods_reference_" + res.fittings_interval[i].groupId).html(res.fittings_interval[i].market_minMax);
        }
      }

      if (res.onload == 'onload') {
        $("*[ectype='SHOP_PRICE']").html(res.result);
      }

      if (add_shop_price == 1) {
        $(".ECS_fittings_interval").html(res.shop_price);
      } else {
        if (res.show_goods == 1) {
          $(".ECS_fittings_interval").html(res.spec_price);
        } else {
          $(".ECS_fittings_interval").html(res.shop_price);
        }
      }
      //更新白条分期购每期的价格 start
      if (res.stages) {
        var i = 0;
        $.each(res.stages, function (k, v) {
          if (k != 1) {
            $('#chooseStages dd strong').eq(i).html('￥' + v + '×' + k + qi);
            $('#chooseStages dd strong').eq(i).next('span').html(free_desc + '0.00%，￥' + v + '×' + k + qi);
          }
          i++;
        });
      }
    }

    isReturn = true;

    if (res.onload == "onload") {
      quantity();
    }
  }

  /******************************************* js方法 end***********************************************/
</script>
<script type="text/javascript">
  $(function () {
    /* 检测配送地区 */
    seller_shipping_area('0');

    //配送区域
    goods_delivery_area();
  });

  /* 获取配送区域 start*/
  function goods_delivery_area() {
    var area = new Object();

    area.province_id = '3';
    area.city_id = '37';
    area.district_id = '410';
    area.street_id = '0';
    area.street_list = '0';
    area.goods_id = '799';
    area.user_id = '62';
    area.region_id = '2';
    area.area_id = '16';
    area.merchant_id = '0';

    // Ajax.call('ajax_dialog.php?act=goods_delivery_area', 'area=' + $.toJSON(area), goods_delivery_areaResponse, 'POST', 'JSON');

  }

  function goods_delivery_areaResponse(result) {
    $("#area_address").html(result.content);
    $(".store-warehouse-info").html(result.warehouse_content);

    if (result.is_theme == 1) {
      get_user_area_shipping(result.goods_id, result.area.region_id, result.area.province_id, result.area.city_id, result.area.district_id, result.area.street_id, result.area.street_list);
    }
  }

  /* 获取配送区域 end*/

  /* 查询用户所在地区是否支持配送 */
  function get_user_area_shipping(goods_id, region_id, province_id, city_id, district_id, street_id, street_list) {

    var area = new Object();

    area.goods_id = goods_id;
    area.region_id = region_id;
    area.province_id = province_id;
    area.city_id = city_id;
    area.district_id = district_id;
    area.street_id = street_id;
    area.street_list = street_list;

    // Ajax.call('ajax_dialog.php?act=user_area_shipping', 'area=' + $.toJSON(area), user_area_shippingResponse, 'POST', 'JSON');
  }

  function user_area_shippingResponse(result) {
    $("#user_area_shipping").html(result.content);

    changePrice('onload');
  }

  /* 检测配送地区 */
  function seller_shipping_area(merchant_id) {
    // Ajax.call('ajax_dialog.php?act=seller_shipping_area','merchant_id=' + merchant_id, ajaxShippingAreaResponse, 'GET', 'JSON');
  }

  function ajaxShippingAreaResponse(result) {
  }


  /* 配送地区 常用地址选择 start*/
  function get_region_change(goods_id, province_id, city_id, district_id) {
    // Ajax.call("ajax_dialog.php", 'id=' + goods_id + '&act=in_stock' + '&province=' + province_id + "&city=" + city_id + "&district=" + district_id, ajax_is_inStock, "GET", "JSON");
  }

  function ajax_is_inStock(res) {
    var t = '&t=' + parseInt(Math.random() * 1000);
    var str_new = window.location.href.replace(/\&t\=\d+/g, t);
    location.href = str_new;
  }

  /* 配送地区 常用地址选择 end*/
</script>
</body>
</html>
