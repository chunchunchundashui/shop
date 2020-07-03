<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\phpStudy\WWW\shop/application/admin\view\category\edit.htm";i:1593435151;s:58:"D:\phpStudy\WWW\shop\application\admin\view\common\top.htm";i:1572317047;s:59:"D:\phpStudy\WWW\shop\application\admin\view\common\left.htm";i:1593325978;s:57:"D:\phpStudy\WWW\shop\application\admin\view\common\js.htm";i:1572488612;}*/ ?>
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
                    <a href="#">
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
                        <a href="<?php echo url('Category/lst'); ?>">商品分类管理</a>
                    </li>
                    <li class="active">修改商品分类</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">修改商品分类</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action=""  method="post" enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $Categorys['id']; ?>" name="id">
                                        <div class="form-group">
                                            <label for="brand_name" class="col-sm-2 control-label no-padding-right">上级分类</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" name="pid">
                                                    <option value="0">顶级分类</option>
                                                    <?php if(is_array($Category) || $Category instanceof \think\Collection || $Category instanceof \think\Paginator): $i = 0; $__LIST__ = $Category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <option <?php if($Categorys['pid'] == $vo['id']): ?> selected="selected" <?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo str_repeat('-', $vo['level']*8)?><?php echo $vo['cate_name']; ?></option>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="cate_name" class="col-sm-2 control-label no-padding-right">分类名称</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" value="<?php echo $Categorys['cate_name']; ?>" placeholder="" name="cate_name" required="" type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="iconfont" class="col-sm-2 control-label no-padding-right">icon图标</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="iconfont" placeholder="" name="iconfont" value="<?php echo $Categorys['iconfont']; ?>" type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname"
                                                   class="col-sm-2 control-label no-padding-right">推荐位</label>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <?php if(is_array($categoryRecpos) || $categoryRecpos instanceof \think\Collection || $categoryRecpos instanceof \think\Paginator): $i = 0; $__LIST__ = $categoryRecpos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recpos): $mod = ($i % 2 );++$i;?>
                                                    <label style="margin-right: 15px;">
                                                        <?php if(in_array($recpos['id'], $myCategoryRecpos)) {
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
                                            <label for="show_nav" class="col-sm-2 control-label no-padding-right">显示到导航</label>
                                            <div class="col-sm-6">
                                                <div class="radio" style="float:left; padding-right: 10px;">
                                                    <label>
                                                        <input <?php if($Categorys['show_cate'] == 1): ?> checked="checked" <?php endif; ?> type="radio" name="show_cate" value="1" class="colored-blue">
                                                        <span class="text">是</span>
                                                    </label>
                                                </div>
                                                <div class="radio" style="float:left;">
                                                    <label>
                                                        <input type="radio" <?php if($Categorys['show_cate'] == 0): ?> checked="checked" <?php endif; ?> name="show_cate" value="0" class="colored-blue">
                                                        <span class="text">否</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="cate_name" class="col-sm-2 control-label no-padding-right">缩略图</label>
                                            <div class="col-sm-6">
                                                <input placeholder="" name="cate_img" type="file">
                                                <?php if($Categorys['cate_img']): ?>
                                                <img src="/shop/public/static/uploads/<?php echo $Categorys['cate_img']; ?>" style="width: 300px" alt="">
                                                <?php else: ?>
                                                暂无图片
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords" class="col-sm-2 control-label no-padding-right">关键词</label>
                                            <div class="col-sm-6">
                                                <textarea style="width: 100%;resize: none"  name="keywords" cols="30" rows="10" class=""><?php echo $Categorys['keywords']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-sm-2 control-label no-padding-right">描述</label>
                                            <div class="col-sm-6">
                                                <!--resize: none  禁止填写框拉动-->
                                                <textarea name="description" style="width: 100%;resize: none" cols="30" rows="10" class=""><?php echo $Categorys['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--<label for="group_id" class="col-sm-2 control-label no-padding-right">分类角色</label>-->
                                        <!--<div class="col-sm-6">-->
                                        <!--<select name="group_id" style="width: 100%;">-->
                                        <!--<option selected="selected" value="8">测试</option>-->
                                        <!--</select>-->
                                        <!--</div>-->
                                        <!--</div>  -->
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="brandAdd" class="btn brand_Add btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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


<script src="/shop/public/static/plus/ueditor/ueditor.config.js"></script>
<script src="/shop/public/static/plus/ueditor/ueditor.all.js"></script>
<script>
    $(function () {
        // UE.getEditor('keywords');
        // UE.getEditor('description');
    });
    // //实现回车提交
    // window.onload = function(){
    //     $(document).keydown(function (e) {
    //         if (e.keyCode === 13) {
    //             $("#brand_Add").trigger("click");
    //         }
    //     });
    // };

</script>

</body></html>