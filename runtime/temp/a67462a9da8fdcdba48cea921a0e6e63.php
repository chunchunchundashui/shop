<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:58:"D:\phpStudy\WWW\shop/application/admin\view\goods\edit.htm";i:1592921811;s:58:"D:\phpStudy\WWW\shop\application\admin\view\common\top.htm";i:1593441874;s:59:"D:\phpStudy\WWW\shop\application\admin\view\common\left.htm";i:1600953260;s:57:"D:\phpStudy\WWW\shop\application\admin\view\common\js.htm";i:1572488612;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>长春THinkPHP5第四季 实战开发大型B2C商城项目</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/shop/public/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/shop/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/shop/public/static/admin/style/demo.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/shop/public/static/admin/style/animate.css" rel="stylesheet">
    <style type="text/css">
        .price{
            width: 250px;
            display: inline-block;
        }
        .abtn{
            padding-right: 10px;
        };
    </style>
</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="/shop/public/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li><a href="<?php echo url('Index/clearCache'); ?>" class="login-area dropdown-toggle">
                            <section>
                                <h2><span class="profile"><span><i class="menu-icon fa fa-trash-o">&nbsp;</i>清空缓存</span></span></h2>
                            </section>
                        </a></li>
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/shop/public/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/logout.html">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/admin/user/changePwd.html">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <!--公共左侧-->
        <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->

        <!--商品管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text">商品管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Goods/lst'); ?>">
                                    <span class="menu-text">商品列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Goods/add'); ?>">
                                    <span class="menu-text">添加商品</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Brand/lst'); ?>">
                                    <span class="menu-text">商品品牌</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Category/lst'); ?>">
                                    <span class="menu-text">商品分类</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Type/lst'); ?>">
                                    <span class="menu-text">商品类型</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                                    <span class="menu-text">商品回收站</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--促销管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-sellsy"></i>
                <span class="menu-text">促销管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="#">
                        <span class="menu-text">团购活动</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">积分商城</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">优惠券</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--推荐位-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa  fa-thumbs-up"></i>
                <span class="menu-text">推荐位管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/Recpos/lst'); ?>">
                        <span class="menu-text">推荐位列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/Recpos/add'); ?>">
                        <span class="menu-text">推荐位添加</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <!--品牌关键词-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa  fa-random"></i>
                <span class="menu-text">栏目关联</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/CategoryWords/lst'); ?>">
                        <span class="menu-text">推荐词关联</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/CategoryBrands/lst'); ?>">
                        <span class="menu-text">品牌关联</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/CategoryAd/lst'); ?>">
                        <span class="menu-text">左图关联</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <!--订单管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-indent"></i>
                <span class="menu-text">订单管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/Order/lst'); ?>">
                        <span class="menu-text">订单列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('admin/Order/orderSelect'); ?>">
                        <span class="menu-text">订单查询</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--会员管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-shield"></i>
                <span class="menu-text">会员管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('member_level/lst'); ?>">
                        <span class="menu-text">会员列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('member_level/add'); ?>">
                        <span class="menu-text">会员级别</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">会员留言</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--权限管理-->
        <!--<li>-->
            <!--<a href="#" class="menu-dropdown">-->
                <!--<i class="menu-icon fa fa-shopping-cart"></i>-->
                <!--<span class="menu-text">权限管理</span>-->
                <!--<i class="menu-expand"></i>-->
            <!--</a>-->
        <!--</li>-->


        <!--数据库管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-database"></i>
                <span class="menu-text">数据库管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="#">
                        <span class="menu-text">数据备份</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">数据表优化</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--短信管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-comments-o"></i>
                <span class="menu-text">短信管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="#">
                        <span class="menu-text">发送短信</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">短信签名</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--文章模块-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon glyphicon glyphicon glyphicon-book"></i>
                <span class="menu-text">文章模块</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Cate/lst'); ?>">
                        <span class="menu-text">文章分类</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Article/lst'); ?>">
                        <span class="menu-text">文章管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--导航模块-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-location-arrow"></i>
                <span class="menu-text">导航模块</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Nav/lst'); ?>">
                        <span class="menu-text">导航列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Nav/add'); ?>">
                        <span class="menu-text">导航添加</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--图片管理-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text">图片管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Article/imglist'); ?>">
                        <span class="menu-text">图片列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('AlternateImg/lst'); ?>">
                        <span class="menu-text">首页轮播图</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>


        <!--系统设置-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-cog"></i>
                <span class="menu-text">系统设置</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('Conf/conflist'); ?>">
                        <span class="menu-text">配置项</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('Conf/lst'); ?>">
                        <span class="menu-text">配置管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu-text">支付方式设置</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>

        <!--友情链接-->
        <li>
            <a href="javascript:void(0)" class="menu-dropdown">
                <i class="menu-icon fa fa-link"></i>
                <span class="menu-text">友情链接</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('link/lst'); ?>">
                        <span class="menu-text">链接列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo url('index/index'); ?>">系统</a>
                    </li>
                    <li>
                        <a href="<?php echo url('Goods/lst'); ?>">商品管理</a>
                    </li>
                    <li class="active">修改商品</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $goods['id']; ?>">
                                <input type="hidden" name="og_thumb" value="<?php echo $goods['og_thumb']; ?>">
                                <input type="hidden" name="big_thumb" value="<?php echo $goods['big_thumb']; ?>">
                                <input type="hidden" name="mid_thumb" value="<?php echo $goods['mid_thumb']; ?>">
                                <input type="hidden" name="sm_thumb" value="<?php echo $goods['sm_thumb']; ?>">
                                <!--商品信息开始-->
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs tabs-flat" id="M">
                                                <li class="active">
                                                    <a href="#baseInfo" data-toggle="tab">
                                                        基本信息
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#goodsDes" data-toggle="tab">
                                                        描述信息
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#mbprice" data-toggle="tab">
                                                        会员价格
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#goodsAttr" data-toggle="tab">
                                                        商品属性
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="#goodsphoto" data-toggle="tab">
                                                        商品相册
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content tabs-flat">
                                                <div id="baseInfo" class="tab-pane active">
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">商品名称</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="cname" value="<?php echo $goods['goods_name']; ?>" placeholder=""
                                                                   name="goods_name" required="" type="text">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">推荐位</label>
                                                        <div class="col-sm-6">
                                                            <div class="checkbox">
                                                                <?php if(is_array($goodsRecpos) || $goodsRecpos instanceof \think\Collection || $goodsRecpos instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsRecpos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recpos): $mod = ($i % 2 );++$i;?>
                                                                <label style="margin-right: 15px;">
                                                                    <?php if(in_array($recpos['id'], $myGoodsRecpos)) {
                                                                                $checked = 'checked="checked"';
                                                                            }else{
                                                                                $checked = '';
                                                                            }
                                                                      ?>
                                                                    <input <?php echo $checked;?> type="checkbox" value="<?php echo $recpos['id']; ?>" name="recpos[]" class="colored-blue">
                                                                    <span class="text"><?php echo $recpos['rec_name']; ?></span>
                                                                </label>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">商品主图</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="cname"
                                                                   style="border:none; box-shadow: none; margin-left: -12px;"
                                                                   name="og_thumb" type="file">
                                                            <?php if($goods['mid_thumb']): ?>
                                                            <img src="/shop/public/static/uploads/<?php echo $goods['mid_thumb']; ?>" height="60px" alt="">
                                                            <?php else: ?>
                                                            暂无缩略图
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="show_nav"
                                                               class="col-sm-2 control-label no-padding-right">是否上架</label>
                                                        <div class="col-sm-6">
                                                            <div class="radio" style="float:left; padding-right: 10px;">
                                                                <label>
                                                                    <input type="radio" id="show_nav" name="on_sale"
                                                                           <?php if($goods['on_sale'] == 1): ?>checked="checked"<?php endif; ?> value="1" class="colored-blue">
                                                                    <span class="text">是</span>
                                                                </label>
                                                            </div>
                                                            <div class="radio" style="float:left;">
                                                                <label>
                                                                    <input type="radio" name="on_sale" <?php if($goods['on_sale'] == 0): ?>checked="checked"<?php endif; ?> value="0" class="colored-blue">
                                                                    <span class="text">否</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                                        <div class="col-sm-6">
                                                            <select name="category_id" class="form-control">
                                                                <option value="">请选择</option>
                                                                <?php if(is_array($Category) || $Category instanceof \think\Collection || $Category instanceof \think\Paginator): $i = 0; $__LIST__ = $Category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($goods['category_id'] == $vo['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo str_repeat('-', $vo['level']*8)?><?php echo $vo['cate_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">所属品牌</label>
                                                        <div class="col-sm-6">
                                                            <select name="brand_id" class="form-control">
                                                                <option value="">请选择</option>
                                                                <?php if(is_array($brandRes) || $brandRes instanceof \think\Collection || $brandRes instanceof \think\Paginator): $i = 0; $__LIST__ = $brandRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($goods['brand_id'] == $vo['id']): ?> selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['brand_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">市场价</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="cname" placeholder=""
                                                                   name="markte_price" value="<?php echo $goods['markte_price']; ?>" required="" type="text">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">本店价</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="cname" placeholder=""
                                                                   name="shop_price" value="<?php echo $goods['shop_price']; ?>" required="" type="text">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">重量</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" style="width: 654px; display: inline-block;" id="cname" placeholder=""
                                                                   name="goods_weight" value="<?php echo $goods['goods_weight']; ?>" required="" type="text">
                                                            <select name="weight_unit" style="width: 109px;">
                                                                <option value="kg" <?php if($goods['weight_unit'] == 'kg'): ?> selected="selected" <?php endif; ?>>kg</option>
                                                                <option value="g" <?php if($goods['weight_unit'] == 'g'): ?> selected="selected" <?php endif; ?>>g</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="goodsDes" class="tab-pane">
                                                    <textarea name="goods_des" id="goods_des"><?php echo $goods['goods_des']; ?></textarea>
                                                </div>

                                                <div id="mbprice" class="tab-pane">
                                                    <?php if(is_array($mlRes) || $mlRes instanceof \think\Collection || $mlRes instanceof \think\Paginator): $i = 0; $__LIST__ = $mlRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right"><?php echo $vo['level_name']; ?></label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="mp[<?php echo $vo['id']; ?>]" value="<?php
                                                            if(isset($mpRes[$vo['id']]['mprice'])) {
                                                                echo $mpRes[$vo['id']]['mprice'];
                                                            }else {
                                                                echo '';
                                                            }
                                                            ?>" type="text">
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </div>

                                                <div id="goodsAttr" class="tab-pane">
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">商品类型</label>
                                                        <div class="col-sm-6">
                                                            <select name="type_id" class="form-control" <?php if($goods['type_id'] != 0): ?> disabled="disabled" <?php endif; ?>>
                                                                <option value="0">请选择</option>
                                                                <?php if(is_array($typeView) || $typeView instanceof \think\Collection || $typeView instanceof \think\Paginator): $i = 0; $__LIST__ = $typeView;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option <?php if($goods['type_id'] == $vo['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['type_name']; ?></option>
                                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div id="attr_list">
                                                        <!-- 属性显示 -->
                                                        <?php foreach($attrRes as $k => $v):if($v['attr_type'] == 1):
                                                                $arrRido = explode(',', $v['attr_values']);
                                                            ?>
                                                            <!-- 单选 -->
                                                        <!--循环显示当前商品所拥有的所有的单选属性-->
                                                        <?php foreach($gattrRes[$v['id']] as $k0 => $v0):?>
                                                            <div class="form-group"><label class="col-sm-2 control-label no-padding-right"><?php echo $v['attr_name']?></label><div class="col-sm-6"><a class="abtn" onclick="addrow(this,'<?php echo $v0['id']; ?>');" href="#"><?php if($k0 == 0) { echo '[+]'; } else{ echo '[-]'; } ?></a>
                                                                <select name='old_goods_attr[<?php echo $v['id']?>][]'>
                                                                    <option value="">请选择</option>
                                                                    <?php foreach($arrRido as $k1 => $v1):?>
                                                                    <option <?php if($v1 == $v0['attr_value']) { echo 'selected="selected"'; }?> value="<?php echo $v1;?>"><?php echo $v1;?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                                 <input type="text" class="form-control price" name="old_attr_price[<?php echo $v0['id']?>]" value="<?php echo $v0['attr_price']; ?>" placeholder="填写价格"></div></div>
                                                        <?php endforeach;else:?>
                                                            <!-- 唯一 如果有值就显示一个单行文本框-->
                                                            <?php if(!$v['attr_values']):?>
                                                                    <div class="form-group"><label class="col-sm-2 control-label no-padding-right"><?php echo $v['attr_name']?></label><div class="col-sm-6">
        <input type="text" name='old_goods_attr[<?php echo $v['id']?>]' class="form-control" value="<?php echo $gattrRes[$v['id']][0]['attr_value']; ?>"><input
                                                                        type="hidden" name="old_attr_price[<?php echo $gattrRes[$v['id']][0]['id']; ?>]"></div></div>
                                                             <?php else:
                                                                $arrSelect = explode(',', $v['attr_values']);
                                                             ?>
                                                             <div class="form-group"><label class="col-sm-2 control-label no-padding-right"><?php echo $v['attr_name']?></label><div class="col-sm-6">
                                                                <select name='old_goods_attr[<?php echo $v['id']?>]'>
                                                                    <option value="">请选择</option>
                                                                    <?php foreach($arrSelect as $k1 => $v1):?>
                                                                    <option <?php if($v1 == $gattrRes[$v['id']][0]['attr_value']) { echo 'selected="selected"'; }?> value="<?php echo $v1;?>"><?php echo $v1;?></option>
                                                                    <?php endforeach;?>
                                                                </select>
                                                                 <input
                                                                     type="hidden" name="old_attr_price[<?php echo $gattrRes[$v['id']][0]['id']; ?>]">
                                                                </div></div>
                                                                <?php endif;endif;endforeach;?>
                                                    </div>
                                                </div>

                                                <div id="goodsphoto" class="tab-pane">
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right">商品相册</label>
                                                        <div class="col-sm-6"></div>
                                                    </div>
                                                    <?php if(is_array($gphotoRes) || $gphotoRes instanceof \think\Collection || $gphotoRes instanceof \think\Paginator): $i = 0; $__LIST__ = $gphotoRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right"></label>
                                                        <div class="col-sm-6">
                                                            <a href="#" onclick="delrow(this,'<?php echo $vo['id']; ?>');">[-]</a>
                                                            <img style="box-shadow: none; display: inline-block;height: 100px;" src="/shop/public/static/uploads/<?php echo $vo['sm_photo']; ?>">
                                                        </div>
                                                    </div>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <div class="form-group">
                                                        <label for="cname"
                                                               class="col-sm-2 control-label no-padding-right"></label>
                                                        <div class="col-sm-6">
                                                            <a href="#" onclick="addphoto(this);">[+]</a><input class="form-control" id="cname" style="border:none; box-shadow: none; display: inline-block;width: 50%" name="goods_photo[]" type="file">
                                                        </div>
                                                    </div>
                                                    <div id="goods_photo"></div>
                                                </div>
                                                <!--</div>-->
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" id="Type_Add" class="btn btn-default">保存信息
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--商品信息结束-->

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="/shop/public/static/admin/style/jquery_002.js"></script>
<script src="/shop/public/static/admin/style/bootstrap.js"></script>
<script src="/shop/public/static/admin/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="/shop/public/static/admin/style/beyond.js"></script>
<script src="/shop/public/static/lib/layer/layer.js"></script>


<script src="/shop/public/static/plus/ueditor/ueditor.config.js"></script>
<script src="/shop/public/static/plus/ueditor/ueditor.all.js"></script>
<script src="/shop/public/static/plus/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
  $(function () {
    UE.getEditor('goods_des',{initialFrameWidth:1550,initialFrameHeight:800,toolbars: [['fullscreen', 'source', 'undo', 'redo','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript','removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist','selectall', 'cleardoc']]});
  });
</script>

<script type="text/javascript">
  // "select[name=type_id]"  获取到select下面的name等于type_id
  $("select[name=type_id]").change(function () {
    // var type_id = $(this).val();     获取当前属性下面的值
    var type_id = $(this).val();
    $.ajax({
      type:"post",
      url:"<?php echo url('Attr/ajaxGetAttr'); ?>",
      // data:{type_id:type_id},     第一个type_id发送过去的参数,第二个type_id上面给的值
      data:{type_id:type_id},
      dataType:'json',
      success:function (data) {
        var html ="";
        // $(data).each(function (k,v)     jq的循环
        $(data).each(function (k,v) {
          if (v.attr_type == 1) {
            // 单选处理
            html+="<div class='form-group'>";
            html+="<label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label>";
            // 拆分数组
            var attrValuesArr = v.attr_values.split(",");
            html+="<div class='col-sm-6'><a class='abtn' onclick='addrow(this);' href='#'>[+]</a>";
            html+="<select name='goods_attr["+v.id+"][]'>";
            html+="<option value=''>请选择</option>";
            for (var i=0; i<attrValuesArr.length; i++) {
              html+="<option value='"+attrValuesArr[i]+"'>"+attrValuesArr[i]+"</option>";
            }
            html+="</select>";
            html+="<input type='text' class='form-control price' name='attr_price[]' placeholder='填写价格'>";
            html+="</div></div>";
          } else {
            // 唯一处理
            if (v.attr_values) {
              html+="<div class='form-group'>";
              html+="<label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label>";
              // 拆分数组
              var attrValuesArr = v.attr_values.split(",");
              html+="<div class='col-sm-6'>";
              html+="<select name=goods_attr["+v.id+"]>";
              html+="<option value=''>请选择</option>";
              for (var i=0; i<attrValuesArr.length; i++) {
                html+="<option value='"+attrValuesArr[i]+"'>"+attrValuesArr[i]+"</option>";
              }
              html+="</select>";
              html+="</div></div>";
            } else {
              html+="<div class='form-group'>";
              html+="<label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label>";
              // 拆分数组
              var attrValuesArr = v.attr_values.split(",");
              html+="<div class='col-sm-6'>";
              html+="<input type='text' name=goods_attr["+v.id+"] class='form-control'>";
              html+="</div></div>";
            }
          }
        });
        $("#attr_list").html(html);
      }
    });
  });

  //商品属性的添加或者多个添加    //上传图片或者多个图片
  function addrow(obj,id) {
    //获取一个a标签的onclick事件.
    //获取到$(obj).parent().parent()子元素
    var div = $(obj).parent().parent();
    //判断对象下面的值是不是+如果是就上一个div,不是就减去一个
    if ($(obj).html() == '[+]') {
      //把上面的值从新克隆一份给divnew
      var divnew = div.clone();
      // 把[+]改成[-]号
      divnew.find('a').html('[-]');
      //{新增加商品只添加,数据库没有的数据修} 改old_attr_price[]为attr_price[],没有id
      divnew.find(':text').attr('name','attr_price[]');
      //修改old_goods_attr[8][]为goods_attr[8][]
      //下面两步是获取动态的id
      var sel = divnew.find('select');
      var oldname = sel.attr('name');
      //js中的替换
      var newname = oldname.replace('old_','');
      sel.attr('name',newname);
      div.after(divnew);
    }else {
      layer.confirm('确认要删除该属性吗？',function(index){
        var div = $(obj).parent().parent();
        //发异步删除数据
        $.post("<?php echo url('GoodsAttr/ajaxdelga'); ?>",{id:id},function (data) {
          if(data.code == 1){
            div.remove();
            //删除成功 删除元素
            layer.msg(data.msg,{icon:1,time:1000});
          }else{
            //删除失败
            layer.msg(data.msg,{icon:2,time:1000});
          }
        });
      });
      return false;
    }
  }
  //商品属性的添加或者多个添加    //上传图片或者多个图片
  function addphoto(obj) {
    //获取一个a标签的onclick事件.
    //获取到$(obj).parent().parent()子元素
    var div = $(obj).parent().parent();
    //判断对象下面的值是不是+如果是就上一个div,不是就减去一个
    if ($(obj).html() == '[+]') {
      //把上面的值从新克隆一份给divnew
      var divnew = div.clone();
      divnew.find('a').html('[-]');
      div.after(divnew);
    }else {
      div.remove();
    }
  }
  // 图片的删除
  function delrow(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            var div = $(obj).parent().parent();
            //发异步删除数据
            $.post("<?php echo url('goods/ajaxdelpic'); ?>",{id:id},function (data) {
                if(data.code == 1){
                    div.remove();
                    //删除成功 删除元素
                    layer.msg(data.msg,{icon:1,time:1000});
                }else{
                    //删除失败
                    layer.msg(data.msg,{icon:2,time:1000});
                }
            });
        });
        return false;
    }
</script>

</body>
</html>