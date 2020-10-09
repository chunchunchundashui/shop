<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:58:"D:\phpStudy\WWW\shop/application/admin\view\order\edit.htm";i:1600178739;s:58:"D:\phpStudy\WWW\shop\application\admin\view\common\top.htm";i:1593441874;s:59:"D:\phpStudy\WWW\shop\application\admin\view\common\left.htm";i:1599486046;s:57:"D:\phpStudy\WWW\shop\application\admin\view\common\js.htm";i:1572488612;}*/ ?>
<!DOCTYPE html>
<html><head>
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
                    <a href="#">
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
                        <a href="<?php echo url('Order/lst'); ?>">品牌管理</a>
                    </li>
                    <li class="active">编辑品牌</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">编辑品牌</span>
                            </div>
                            <div class="widget-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $orderInfo['id']; ?>">
                                <table class="table table-hover">
                                    <thead class="bordered-darkorange">
                                    <tr>
                                        <th width="10%" style="text-align: right;">
                                            名称
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="text-align: right;">
                                            订单id
                                        </td>
                                        <td>
                                            <?php echo $orderInfo['id']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            订单号
                                        </td>
                                        <td>
                                            <?php echo $orderInfo['out_trade_no']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            下单用户
                                        </td>
                                        <td>
                                            <input type="text" name="username" value="<?php echo $orderInfo['username']; ?>" placeholder="填写已知的用户名称">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            商品总额
                                        </td>
                                        <td>
                                            <input type="text" name="goods_total_price" value="<?php echo $orderInfo['goods_total_price']; ?>" placeholder="填写已知的用户名称">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            支付方式
                                        </td>
                                        <td>
                                            <select name="payment" id="">
                                                <option  value="">请选择</option>
                                                <option <?php if($orderInfo['payment'] == 1): ?>selected="selected"<?php endif; ?> value="1">支付宝</option>
                                                <option <?php if($orderInfo['payment'] == 2): ?>selected="selected"<?php endif; ?> value="2">微信</option>
                                                <option <?php if($orderInfo['payment'] == 3): ?>selected="selected"<?php endif; ?> value="3">余额</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            配送方式
                                        </td>
                                        <td>
                                            <select name="distribution" id="">
                                                <option  value="">请选择</option>
                                                <option <?php if($orderInfo['distribution'] == '申通'): ?>selected="selected"<?php endif; ?> value="申通">申通</option>
                                                <option <?php if($orderInfo['distribution'] == '顺丰'): ?>selected="selected"<?php endif; ?> value="顺丰">顺丰</option>
                                                <option <?php if($orderInfo['distribution'] == '圆通'): ?>selected="selected"<?php endif; ?> value="圆通">圆通</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            订单状态
                                        </td>
                                        <td>
                                            <select name="order_status" id="">
                                                <option  value="">请选择</option>
                                                <option <?php if($orderInfo['order_status'] == 0): ?>selected="selected"<?php endif; ?> value="0">未确认</option>
                                                <option <?php if($orderInfo['order_status'] == 1): ?>selected="selected"<?php endif; ?> value="1">已确认</option>
                                                <option <?php if($orderInfo['order_status'] == 2): ?>selected="selected"<?php endif; ?> value="2">申请退款</option>
                                                <option <?php if($orderInfo['order_status'] == 3): ?>selected="selected"<?php endif; ?> value="3">退款成功</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            发货状态
                                        </td>
                                        <td>
                                            <select name="post_status" id="">
                                                <option  value="">请选择</option>
                                                <option <?php if($orderInfo['post_status'] == 0): ?>selected="selected"<?php endif; ?> value="0">未发货</option>
                                                <option <?php if($orderInfo['post_status'] == 1): ?>selected="selected"<?php endif; ?> value="1">已发货</option>
                                                <option <?php if($orderInfo['post_status'] == 2): ?>selected="selected"<?php endif; ?> value="2">已收货</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            运费
                                        </td>
                                        <td>
                                            <input type="text" name="post_spent" value="<?php echo $orderInfo['post_spent']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            收货人
                                        </td>
                                        <td>
                                            <input type="text" name="name" value="<?php echo $orderInfo['name']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            手机号
                                        </td>
                                        <td>
                                            <input type="text" name="phone" value="<?php echo $orderInfo['phone']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            省份
                                        </td>
                                        <td>
                                            <input type="text" name="province" value="<?php echo $orderInfo['province']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            城市
                                        </td>
                                        <td>
                                            <input type="text" name="city" value="<?php echo $orderInfo['city']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            县/区
                                        </td>
                                        <td>
                                            <input type="text" name="county" value="<?php echo $orderInfo['county']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            详细地址
                                        </td>
                                        <td>
                                            <input type="text" name="adress" value="<?php echo $orderInfo['adress']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            下单时间
                                        </td>
                                        <td>
                                            <input type="text" name="create_time" value="<?php echo date("Y-m-d H:i:s",$orderInfo['create_time']); ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            订单商品
                                        </td>
                                        <td>
                                            商品列表
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right;">
                                            提交修改
                                        </td>
                                        <td>
                                            <input type="submit" id="brandEdit" value="提交修改">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
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


<script src="__PLUS__/ueditor/ueditor.config.js"></script>
<script src="__PLUS__/ueditor/ueditor.all.js"></script>
<script>
    $(function () {
        UE.getEditor('brand_description');


        $('#brandEdit').click(function () {
            $.ajax({
                url:"<?php echo url('admin/Order/edit'); ?>",
                type:'post',
                data:$('form').serialize(),
                dataType:'json',
                success:function (data) {
                    if (data.code == 1) {
                        layer.msg(data.msg, {
                            icon:6,
                            time:1000
                        }, function () {
                            location.href = data.url;
                        });
                    }else {
                        layer.open({
                            title:"商品修改失败!",
                            content:data.msg,
                            icon:5,
                            anim:6
                        });
                    }
                }
            });
            return false;
        });
    });


</script>

</body></html>