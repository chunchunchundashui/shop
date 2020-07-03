<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\phpStudy\WWW\shop/application/member\view\account\reg.htm";i:1593530079;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="童攀课堂-php课堂-www.tongpankt.com" />
<meta name="Description" content="童攀课堂-php课堂-www.tongpankt.com" />
<title>交流群：383432579</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/base.css" />
<link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/style.css" />
<link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/purebox.css" />
<link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/quickLinks.css" />

<script type="text/javascript" src="/shop/public/static/index/js/jquery-1.9.1.min.js"></script><script type="text/javascript" src="/shop/public/static/index/js/jquery.json.js"></script><script type="text/javascript" src="/shop/public/static/index/js/transport_jquery.js"></script>
<script type="text/javascript">
/*登录、注册、找回密码js语言包*/
var default_username = "<i class='iconfont icon-info-sign'></i>支持中文、字母、数字、”-”的组合，3-20个字符";
var username_empty = "<i class='iconfont icon-minus-sign'></i>请输入用户名";
var username_shorter = "<i class='iconfont icon-minus-sign'></i>用户名长度不能少于 4 个字符。";
var username_invalid = "<i class='iconfont icon-minus-sign'></i>用户名只能是由字母数字以及下划线组成。";
var password_empty = "<i class='iconfont icon-minus-sign'></i>请输入密码";
var password_shorter = "<i class='iconfont icon-minus-sign'></i>登录密码不能少于 6 个字符。";
var confirm_password_invalid = "<i class='iconfont icon-minus-sign'></i>两次输入密码不一致";
var captcha_empty = "<i class='iconfont icon-minus-sign'></i>请输入验证码";
var email_empty = "<i class='iconfont icon-minus-sign'></i>Email不能为空";
var email_invalid = "<i class='iconfont icon-minus-sign'></i>Email 不是合法的地址";
var agreement = "<i class='iconfont icon-minus-sign'></i>您没有接受协议";
var msn_invalid = "<i class='iconfont icon-minus-sign'></i>msn地址不是一个有效的邮件地址";
var qq_invalid = "<i class='iconfont icon-minus-sign'></i>QQ号码不是一个有效的号码";
var home_phone_invalid = "<i class='iconfont icon-minus-sign'></i>家庭电话不是一个有效号码";
var office_phone_invalid = "<i class='iconfont icon-minus-sign'></i>办公电话不是一个有效号码";
var mobile_phone_invalid = "<i class='iconfont icon-minus-sign'></i>手机号码不是一个有效号码";
var no_select_question = "<i class='iconfont icon-minus-sign'></i>您没有完成密码提示问题的操作";
var msg_un_blank = "<i class='iconfont icon-minus-sign'></i>用户名不能为空";
var msg_un_length = "<i class='iconfont icon-minus-sign'></i>用户名最长不得超过15个字符，一个汉字等于2个字符";
var msg_un_format = "<i class='iconfont icon-minus-sign'></i>用户名含有非法字符";
var msg_un_registered = "<i class='iconfont icon-minus-sign'></i>用户名已经存在,请重新输入";
var msg_email_blank = "<i class='iconfont icon-minus-sign'></i>邮件地址不能为空";
var msg_email_registered = "<i class='iconfont icon-minus-sign'></i>邮箱已存在,请重新输入";
var msg_email_format = "<i class='iconfont icon-minus-sign'></i>格式错误，请输入正确的邮箱地址";
var msg_blank = "<i class='iconfont icon-minus-sign'></i>不能为空";
var passwd_balnk = "<i class='iconfont icon-minus-sign'></i>密码中不能包含空格";
var msg_phone_blank = "<i class='iconfont icon-minus-sign'></i>手机号码不能为空";
var msg_phone_registered = "<i class='iconfont icon-minus-sign'></i>手机已存在,请重新输入";
var msg_phone_invalid = "<i class='iconfont icon-minus-sign'></i>无效的手机号码";
var msg_phone_not_correct = "<i class='iconfont icon-minus-sign'></i>手机号码不正确，请重新输入";
var msg_mobile_code_blank = "<i class='iconfont icon-minus-sign'></i>手机验证码不能为空";
var msg_mobile_code_not_correct = "<i class='iconfont icon-minus-sign'></i>手机验证码不正确";
var msg_confirm_pwd_blank = "<i class='iconfont icon-minus-sign'></i>确认密码不能为空";
var msg_identifying_code = "<i class='iconfont icon-minus-sign'></i>验证码不能为空";
var msg_identifying_not_correct = "<i class='iconfont icon-minus-sign'></i>验证码不正确";
var weak = "弱";
var In = "中";
var strong = "强";
var null_username = "<i class='iconfont icon-minus-sign'></i>用户名不能为空";
var null_email = "<i class='iconfont icon-minus-sign'></i>邮箱不能为空";
var null_captcha = "<i class='iconfont icon-minus-sign'></i>验证码不能为空";
var null_phone = "<i class='iconfont icon-minus-sign'></i>手机不能为空";
var select_password_question = "<i class='iconfont icon-minus-sign'></i>请选择密码提示问题";
var null_password_question = "<i class='iconfont icon-minus-sign'></i>问题不能为空";
var error_email = "<i class='iconfont icon-minus-sign'></i>验证码错误";
var msg_can_rg = "<i class='iconfont icon-ok'></i>可以注册";
var user_name_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的用户名！";
var email_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的电子邮件地址！";
var phone_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的手机号！";
var phone_address_empty_11 = "<i class='iconfont icon-minus-sign'></i>请输入正确11位手机号码！";
var phone_address_empty_bzq = "<i class='iconfont icon-minus-sign'></i>您输入的手机号码不正确！";
var wenti_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的注册问题！";
var email_address_error = "<i class='iconfont icon-minus-sign'></i>您输入的电子邮件地址格式不正确！";
var new_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的新密码！";
var confirm_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的确认密码！";
var both_password_error = "<i class='iconfont icon-minus-sign'></i>您两次输入的密码不一致！";
</script>
</head>

<body class="bg-ligtGary">
	<div class="register">
        <div class="loginRegister-header">
            <div class="w w1200">
                <div class="logo">
					<div class="logoImg"><a href="#" class="logo"><img src="/shop/public/static/index/img/user_login_logo.png" /></a></div>
                    <div class="logo-span">
                    	<b style="background:url(/shop/public/static/index/img/login_logo_pic.png) no-repeat;"></b>                    </div>
                </div>
                <div class="header-href">
                    <span>已注册可<a href="<?php echo url('member/account/login'); ?>" class="jump">在此登录</a></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="w w1200">
                <div class="register-wrap">
                	<div class="register-adv">
					<a href="#" target="_blank"><img width="400" height="324" src="/shop/public/static/index/img/1488939821671881226.jpg" /></a>
					</div>
                    <div class="register-form">
                    	<div class="form form-other">
                            <form action="user.php" method="post" name="formUser" onsubmit="return mobileRegister();">
                            	<div class="item">
                                	<div class="item-label">用　户　名</div>
                                	<div class="item-info">
                                    	<input type="text" name="username" id="username" onblur="is_registered(this.value, 1);" class="text" value="" autocomplete="off" />
                                    </div>
                                    <div class="input-tip"><span id="username_notice_1"></span></div>
                                </div>
                                <div class="item">
                                	<div class="item-label">设 置 密 码</div>
                                	<div class="item-info">
                                        <input type="password" style="display:none"/>
                                    	<input type="password" name="password" id="pwd" class="text" value="" autocomplete="off" />
                                    </div>
                                    <div class="input-tip"><span id="phone_password"></span></div>
                                </div>
                                <div class="item">
                                	<div class="item-label">确 认 密 码</div>
                                	<div class="item-info">
                                        <input type="password" style="display:none"/>
                                    	<input type="password" name="confirm_password" id="pwdRepeat" class="text" value="" autocomplete="off" />
                                    </div>
                                    <div class="input-tip"><span id="phone_confirm_password"></span></div>
                                </div>
                                <div class="item" id="phone_yz">
                                	<div class="item-label">手 机 号 码</div>
                                	<div class="item-info">
                                    	<input type="text" name="mobile_phone" id="mobile_phone" onblur="checkPhone(this.value);" class="text" value="" autocomplete="off" />
                                        <a href="#" class="email_open ftx-05">或邮箱验证</a>
                                    </div>
                                    <div class="input-tip"><span id="phone_notice"></span></div>
                                </div>
                                <div class="item" id="email_yz" style="display:none;">
                                	<div class="item-label">邮 箱 验 证</div>
                                	<div class="item-info">
                                    	<input type="text" name="email" id="regName" onblur="checkEmail(this.value);" class="text" value="" autocomplete="off" />
                                        <a href="#" class="email_off ftx-05">或手机验证</a>
                                    </div>
                                    <div class="input-tip"><span id="email_notice"></span></div>
                                </div>
                                
                                                                                                                                                                                                
																                                <div class="item item2">
                                	<div class="item-checkbox">
                                        <input type="checkbox" id="clause2" class="ui-solid-checkbox" checked="checked" value="1" name="mobileagreement">
                                        <label class="ui-solid-label" for="clause2">我已阅读并同意<a href="#" class="ftx-05" target="_blank">《用户注册协议》</a></label>
                                    </div>
                                	<div class="input-tip"><span id="mobileagreement"></span></div>
                                </div>
                                <div class="item item2 item-button">
									<input type="hidden" name="flag" id="flag" value='register' />
									<input name="register_type" type="hidden" value="1" />
									<input type="hidden" name="seccode" id="seccode" value="" />
									<input name="act" type="hidden" value="act_register" >
									<input name="register_mode" type="hidden" value="1" >
									<input id="phone_code_callback" type="hidden" value="0" >
									<input id="phone_captcha_verification" type="hidden" value="" />
									<input id="phone_verification" type="hidden" value="0" />
									<input id="email_verification" type="hidden" value="0" />
									<input id="enabled_captcha" type="hidden" value="" />
									<input type="submit" id="registsubmit" name="Submit" maxlength="8" class="btn sc-redBg-btn" value="立即注册"/>
                                </div>
                            </form>
                    	</div>            
                    </div>
                </div>
            </div>
        </div>
	</div>
	<script type="text/javascript">
    $("input[name='sel_question']").val('');
    $("#seccode").val();
    </script>


<div class="footer user-footer">
	<div class="dsc-copyright">
		<div class="w w1200">
			 
			<p class="footer-ecscinfo pb10">
				 
				<a href="#" >首页</a> 
				 
				| 
				 
				 
				<a href="#" >隐私保护</a> 
				 
				| 
				 
				 
				<a href="#" >联系我们</a> 
				 
				| 
				 
				 
				<a href="#" >免责条款</a> 
				 
				| 
				 
				 
				<a href="#" >公司简介</a> 
				 
				| 
				 
				 
				<a href="#" >意见反馈</a> 
				 
				 
			</p>
			 <p><span>©&nbsp;2015-2017&nbsp;tongpankt.com&nbsp;版权所有&nbsp;&nbsp;</span><span>ICP备案证书号:</span><a href="#">豫ICP备*****号-1</a>&nbsp;<a href="#">POWERED by童攀课堂</a></p>
        
        <p class="copyright_auth">&nbsp;</p>
					</div>
	</div>
    
    
    <div class="hidden">
        <input type="hidden" name="seller_kf_IM" value="" rev="" ru_id="" />
        <input type="hidden" name="seller_kf_qq" value="349488953" />
        <input type="hidden" name="seller_kf_tel" value="4000-000-000" />
        <input type="hidden" name="user_id" value="0" />
    </div>
</div>

<script type="text/javascript" src="/shop/public/static/index/js/scroll_city.js"></script><script type="text/javascript" src="/shop/public/static/index/js/user.js"></script><script type="text/javascript" src="/shop/public/static/index/js/user_register.js"></script><script type="text/javascript" src="/shop/public/static/index/js/utils.js"></script><script type="text/javascript" src="/shop/public/static/index/js/jquery.SuperSlide.2.1.1.js"></script><script type="text/javascript" src="/shop/public/static/index/js/sms.js"></script><script type="text/javascript" src="/shop/public/static/index/js/perfect-scrollbar.min.js"></script><script type="text/javascript" src="/shop/public/static/index/js/jquery.validation.min.js"></script><script type="text/javascript" src="/shop/public/static/index/js/dsc-common.js"></script>
<script type="text/javascript">


$(function(){
	if(document.getElementById("seccode")){
		$("#seccode").val(0);
	}
	
	$("form[name='formUser'] :input[name='register_type']").val(1);
	
	//验证码切换
	$(".changeNextone").click(function(){
		$("#captcha_img").attr('src', 'captcha.php?'+Math.random());
	});
	$(".changeNexttwo").click(function(){
		$("#authcode_img").attr('src', 'captcha.php?'+Math.random());
	});
	
	var is_passwd_questions = $("form[name='getPassword'] :input[name='is_passwd_questions']").val();
	
	if(typeof(is_passwd_questions) == 'undefined'){
		$("#form_getPassword1").hide();
		$("#form_getPassword2").hide();
		$("#form_getPassword1").siblings().css({'width':'50%'});
	}
	
	/*$(".email_open").click(function(){
		$("#email_yz").show();
		$(this).parent().hide();
		$("#email_yz").find(".tx_rm").show();
	});
	
	$(".email_off").click(function(){
		$("#email_yz").hide();
		$(this).parent().hide();
		$("#phone_yz").find(".tx_rm").show();
	});*/
	
	$(".email_open").click(function(){
	
		var email = $("#regName").val();
		
		if(email){
			checkEmail(email);
		}else{
			$("#phone_notice").html('');
			$("#code_notice").html('');
			$("#phone_verification").val(0);
		}
		
		$("#mobile_phone").val("");
		$("#email_yz").show();
		$("#email_yz").find(".tx_rm").show();
		
		$("#phone_yz").hide();
		$("#code_mobile").hide();
		
		$("form[name='formUser'] :input[name='register_type']").val(0);
		$("#registsubmit").attr("disabled", false);
	});
	
	$(".email_off").click(function(){
		
		var mobile_phone = $("#mobile_phone").val();
		
		if(mobile_phone){
			checkPhone(mobile_phone);
		}else{
			$("#email_notice").html('');
			$("#email_verification").val(0);
		}
		
		$("#regName").val("");
		$("#email_yz").hide();
		$("#phone_yz").find(".tx_rm").show();
		
		$("#phone_yz").show();
		$("#code_mobile").show();
		
		$("form[name='formUser'] :input[name='register_type']").val(1);
		$("#registsubmit").attr("disabled", false);
	});
	
	
	$.divselect("#divselect","#passwd_quesetion");
	$.divselect("#divselect2","#passwd_quesetion2");
});
</script>
</body>
</html>

