<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"D:\phpStudy\WWW\shop/application/admin\view\article\lst.htm";i:1574320168;s:58:"D:\phpStudy\WWW\shop\application\admin\view\common\top.htm";i:1593441874;s:59:"D:\phpStudy\WWW\shop\application\admin\view\common\left.htm";i:1593325978;s:57:"D:\phpStudy\WWW\shop\application\admin\view\common\js.htm";i:1572488612;}*/ ?>
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
                        <a href="<?php echo url('admin/index/index'); ?>">系统</a>
                    </li>
                                        <li class="active">商品管理</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="添加品牌"  class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                        <tr>
                            <th class="text-center" width="6%">ID</th>
                            <th>标题</th>
                            <th class="text-center" width="12%">缩略图</th>
                            <th class="text-center" width="12%">所属栏目</th>
                            <th class="text-center" width="6%">是否跳转</th>
                            <th class="text-center" width="6%">是否置顶</th>
                            <th class="text-center" width="6%">显示状态</th>
                            <th class="text-center" width="10%">发布时间</th>
                            <th class="text-center" width="10%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td align="center"><?php echo $vo['id']; ?></td>
                            <!--  字符串截取cut_str ###默认值不需要修改,10为从第几位截取  -->
                            <td><?php echo cut_str($vo['title'],10); ?></td>
                            <td align="center">
                                <?php if($vo['thumb'] != ''): ?>
                                    <img src="/shop/public/static/uploads/<?php echo $vo['thumb']; ?>" height="30" alt="">
                                <?php else: ?>
                                    暂无图片
                                <?php endif; ?>
                            </td>
                            <td align="center"><?php echo $vo['cate_name']; ?></td>
                            <td align="center"><?php if($vo['link_url'] != ''): ?>是<?php else: ?>否<?php endif; ?></td>
                            <td align="center"><?php if($vo['show_top'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                            <td align="center"><?php if($vo['show_status'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
                            <td align="center"><?php echo date("Y-m-d H:i:s",$vo['addtime']); ?></td>
                            <td align="center">
                                <a href="<?php echo url('edit', array('id'=>$vo['id'])); ?>" class="btn btn-primary btn-sm shiny">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="javascript:;" class="btn btn-danger article_del btn-sm shiny" dataid="<?php echo $vo['id']; ?>">删除</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>

                </div>
                    <div style="padding-top: 10px; text-align: right;">
                        <!--分页-->
                        <?php echo $article->render(); ?>
                    </div>
                <div>
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


    <script>
        $(function () {
           $('.article_del').click(function () {
               var id = $(this).attr('dataid');
               layer.confirm('确定要删除吗?', {
                   title:'删除文章',
                   icon:3,
               }, function (index) {
                   layer.close(index);
                   $.ajax({
                       url:"<?php echo url('article/del'); ?>",
                       type:'post',
                       data:{id:id},
                       dataType:'json',
                       success:function (data) {
                           if (data.code == 1) {
                               layer.msg(data.msg , {
                                   icon:6,
                                   time:2000
                               }, function () {
                                   location.href = data.url;
                               });
                           }else {
                               layer.open({
                                   title:"商品删除失败!",
                                   content:data.msg,
                                   icon:5,
                                   anim:6
                               });
                           }
                       }
                   });
               });
               return false;
           });
        });
    </script>


</body></html>