<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\phpStudy\WWW\shop/application/admin\view\conf\conflist.htm";i:1574320167;s:58:"D:\phpStudy\WWW\shop\application\admin\view\common\top.htm";i:1593441874;s:59:"D:\phpStudy\WWW\shop\application\admin\view\common\left.htm";i:1600953260;s:57:"D:\phpStudy\WWW\shop\application\admin\view\common\js.htm";i:1572488612;}*/ ?>
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
                        <a href="<?php echo url('conf/confList'); ?>">配置管理</a>
                    </li>
                                        <li class="active">配置列表</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <!--配置列表开始-->
            <div class="widget-body">
                <div class="widget-main">
                    <div class="tabbable">
                        <ul class="nav nav-tabs tabs-flat" id="myTabll">
                            <li class="active">
                                <a href="#home11" data-toggle="tab">
                                    店铺配置
                                </a>
                            </li>
                            <li class="">
                                <a href="#profile11" data-toggle="tab">
                                    商品配置
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tabs-flat">
                            <div class="tab-pane active" id="home11">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action=""  method="post" enctype="multipart/form-data">
                                        <!--这儿需要使用原生态循环,后面有很多判断需要做-->
                                        <?php foreach ($shopConfRes as $k => $conf):?>
                                        <div class="form-group">
                                            <label for="cname" class="col-sm-2 control-label no-padding-right"><?php echo $conf['cname'];?></label>
                                            <div class="col-sm-6">
                                                <?php if($conf['form_type'] == 'input'):?>
                                                <!--单行文本-->
                                                    <input class="form-control" id="cname" placeholder="" value="<?php echo $conf['value']?>" name="<?php echo $conf['ename'];?>" type="text">
                                                <?php elseif($conf['form_type'] == 'textarea'):?>
                                                <!--文本域-->
                                                    <textarea name="<?php echo $conf['ename'];?>" class="form-control" style="width: 100%;"><?php echo $conf['value']?></textarea>
                                                <?php elseif($conf['form_type'] == 'radio'):?>
                                                <!--单选按钮-->
                                                    <div class="radio">
                                                        <?php if($conf['values']):
                                                            $arr  = explode(',', $conf['values']);
                                                            foreach ($arr as $k1=>$v1):
                                                         ?>
                                                        <label>
                                                            <input <?php if($conf['value'] == $v1){ echo 'checked="checked"'; }?> type="radio" value="<?php echo $v1;?>" name="<?php echo $conf['ename'];?>" class="colored-blue">
                                                            <span class="text"><?php echo $v1;?></span>
                                                        </label>
                                                        <?php endforeach; endif;?>
                                                    </div>
                                                <?php elseif($conf['form_type'] == 'select'):?>
                                                <!--下拉菜单-->
                                                <select style="width: 100%;" name="<?php echo $conf['ename'];?>">
                                                    <option value="">请选择</option>
                                                    <?php if($conf['values']):
                                                            $arr  = explode(',', $conf['values']);
                                                            foreach ($arr as $k1=>$v1):
                                                    ?>
                                                    <option <?php if($conf['value'] == $v1){ echo 'selected="selected"'; }?> value="<?php echo $v1;?>"><?php echo $v1;?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                                <?php elseif($conf['form_type'] == 'checkbox'):?>
                                                <!--复选框-->
                                                    <div class="checkbox">
                                                        <?php if($conf['values']):
                                                            $arr_values  = explode(',', $conf['values']);
                                                            $arr_value  = explode(',', $conf['value']);
                                                            foreach ($arr_values as $k1=>$v1):
                                                        ?>
                                                        <label>
                                                            <input <?php if(in_array($v1, $arr_value)){ echo 'checked="checked"'; }?> type="checkbox" value="<?php echo $v1;?>"  name="<?php echo $conf['ename'];?>[]" class="colored-blue">
                                                            <!-- []是以数组方式传送    -->
                                                            <span class="text"><?php echo $v1;?></span>
                                                        </label>
                                                        <?php endforeach; endif;?>
                                                    </div>
                                                <?php elseif($conf['form_type'] == 'file'):?>
                                                <!--文件上传-->
                                                    <input placeholder="" name="<?php echo $conf['ename'];?>" type="file">
                                                <?php if($conf['value']):?>
                                                <img src="/shop/public/static/uploads/<?php echo $conf['value']; ?>" style="width: 300px;">
                                                <?php else:?>
                                                    暂无缩略图
                                                <?php endif;endif;?>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="brandAdd" class="btn brand_Add btn-default">保存信息</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                        <div class="tab-pane" id="profile11">
                                        <div class="form-horizontal">
                                        <!--这儿需要使用原生态循环,后面有很多判断需要做-->
                                        <?php foreach ($goodsConfRes as $k => $conf):?>
                                        <div class="form-group">
                                            <label for="cname" class="col-sm-2 control-label no-padding-right"><?php echo $conf['cname'];?></label>
                                            <div class="col-sm-6">
                                                <?php if($conf['form_type'] == 'input'):?>
                                                <!--单行文本-->
                                                <input class="form-control" id="cname" placeholder="" value="<?php echo $conf['value']?>" name="<?php echo $conf['ename'];?>" type="text">
                                                <?php elseif($conf['form_type'] == 'textarea'):?>
                                                <!--文本域-->
                                                <textarea name="<?php echo $conf['ename'];?>" class="form-control" style="width: 100%;"><?php echo $conf['value']?></textarea>
                                                <?php elseif($conf['form_type'] == 'radio'):?>
                                                <!--单选按钮-->
                                                <div class="radio">
                                                    <?php if($conf['values']):
                                                            $arr  = explode(',', $conf['values']);
                                                            foreach ($arr as $k1=>$v1):
                                                    ?>
                                                    <label>
                                                        <input <?php if($conf['value'] == $v1){ echo 'checked="checked"'; }?> type="radio" value="<?php echo $v1;?>" name="<?php echo $conf['ename'];?>" class="colored-blue">
                                                        <span class="text"><?php echo $v1;?></span>
                                                    </label>
                                                    <?php endforeach; endif;?>
                                                </div>
                                                <?php elseif($conf['form_type'] == 'select'):?>
                                                <!--下拉菜单-->
                                                <select style="width: 100%;" name="<?php echo $conf['ename'];?>">
                                                    <option value="">请选择</option>
                                                    <?php if($conf['values']):
                                                            $arr  = explode(',', $conf['values']);
                                                            foreach ($arr as $k1=>$v1):
                                                    ?>
                                                    <option <?php if($conf['value'] == $v1){ echo 'selected="selected"'; }?> value="<?php echo $v1;?>"><?php echo $v1;?></option>
                                                    <?php endforeach; endif;?>
                                                </select>
                                                <?php elseif($conf['form_type'] == 'checkbox'):?>
                                                <!--复选框-->
                                                <div class="checkbox">
                                                    <?php if($conf['values']):
                                                            $arr_values  = explode(',', $conf['values']);
                                                            $arr_value  = explode(',', $conf['value']);
                                                            foreach ($arr_values as $k1=>$v1):
                                                    ?>
                                                    <label>
                                                        <input <?php if(in_array($v1, $arr_value)){ echo 'checked="checked"'; }?> type="checkbox" value="<?php echo $v1;?>"  name="<?php echo $conf['ename'];?>[]" class="colored-blue">
                                                        <!-- []是以数组方式传送    -->
                                                        <span class="text"><?php echo $v1;?></span>
                                                    </label>
                                                    <?php endforeach; endif;?>
                                                </div>
                                                <?php elseif($conf['form_type'] == 'file'):?>
                                                <!--文件上传-->
                                                <input placeholder="" name="<?php echo $conf['ename'];?>" type="file">
                                                <?php if($conf['value']):?>
                                                <img src="/shop/public/static/uploads/<?php echo $conf['value']; ?>" style="width: 300px;">
                                                <?php else:?>
                                                暂无缩略图
                                                <?php endif;endif;?>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
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
            // UE.getEditor('brand_description');
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