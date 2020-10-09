<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\phpStudy\WWW\shop/application/member\view\account\get_password.htm";i:1594988242;}*/ ?>
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="Keywords" content="大商创 免费商城系统 免费B2B2C 免费多商户系统  多店铺商城系统 企业级电商系统  ecsho"/>
  <meta name="Description"
        content="大商创是由商创网络（模板堂）推出的免费B2B2C商城系统，支持多店铺入驻，包含多城市多仓库等众多功能，能帮助企业及个人快速搭建多商户电商系统，并减少二次开发带来的成本"/>

  <title>用户中心_找回密码</title>


  <link rel="shortcut icon" href="favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/base.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/style.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/iconfont.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/purebox.css"/>
  <link rel="stylesheet" type="text/css" href="/shop/public/static/index/css/quickLinks.css"/>
  <style>
    .sms-btn {
      background: none;
      background-color: #eee;
      border: 1px solid #ccc;
      border-radius: 3px;
      cursor: pointer;
      outline: none;
    }
  </style>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery.json.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/transport_jquery.js"></script>
  <script type="text/javascript" src="/shop/public/static/index/js/jquery.cookie.js"></script>
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
    var mobile_phone_username_equalTo = "<i class='iconfont icon-minus-sign'></i>用户不能和手机号码相同";
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
    var msg_email_code = "<i class='iconfont icon-minus-sign'></i>邮箱验证码不能为空";
    var msg_email_code_not = "<i class='iconfont icon-minus-sign'></i>邮箱验证码不正确";
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
    var user_name_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的用户名";
    var email_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的电子邮件地址";
    var phone_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的手机号";
    var phone_address_empty_11 = "<i class='iconfont icon-minus-sign'></i>请输入正确11位手机号码";
    var phone_address_empty_bzq = "<i class='iconfont icon-minus-sign'></i>您输入的手机号码不正确";
    var wenti_address_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的注册问题";
    var email_address_error = "<i class='iconfont icon-minus-sign'></i>您输入的电子邮件地址格式不正确";
    var new_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的新密码";
    var confirm_password_empty = "<i class='iconfont icon-minus-sign'></i>请输入您的确认密码";
    var both_password_error = "<i class='iconfont icon-minus-sign'></i>您两次输入的密码不一致";
  </script>
  <!-- 异步请求连接到user_register.js -->
  <script src="/shop/public/static/lib/layer/layer.js"></script>
  <script type="text/javascript">
    //
    <!--  获取短信验证码 -->
    var phone_url = "<?php echo url('member/Account/sendSms'); ?>";
    // 获取邮箱验证码
    var email_url = "<?php echo url('member/Account/sendEmail'); ?>";
    //    异步验证用户名是否注册
    var check_registered = "<?php echo url('member/Account/isRegistered'); ?>";
    //    异步验证手机号是否注册
    var check_phone = "<?php echo url('member/Account/checkPhone'); ?>";
    //    异步验证邮箱是否注册
    var check_email = "<?php echo url('member/Account/checkEmail'); ?>";
    //    异步验证邮箱验证码
    var checkd_email_send_code = "<?php echo url('member/Account/checkdEmailSendCode'); ?>";
    //    异步验证手机验证码短信
    var code_notice = "<?php echo url('member/Account/codeNotice'); ?>";
    // $.cookie('total', '60', { expires: 7 });
    //  验证手机号并发送短信找回密码
    var check_send_msg = "<?php echo url('member/account/checkAndSendMsg'); ?>";
    var check_send_code = "<?php echo url('member/account/checkPhoneCode'); ?>";
  </script>
</head>

<body class="bg-ligtGary">


<div class="get_pwd">
  <div class="loginRegister-header">
    <div class="w w1200">
      <div class="logo">
        <div class="logoImg"><a href="<?php echo url('index/index/index'); ?>" class="logo"><img
            src="/shop/public/static/index/img/user_login_logo.png"/></a></div>
        <div class="logo-span">
          <b style="background:url(/shop/public/static/index/img/login_logo_pic.png) no-repeat;"></b></div>
      </div>
      <div class="header-href">
        <span>已注册可<a href="<?php echo url('member/account/login'); ?>" class="jump">在此登录</a></span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="w w1200">
      <div class="get_pwd_warp">
        <div class="get_pwd_form">

          <div class="form form-other" ectype="formWarp">
            <div class="item item-other">
              <div class="item-label">&nbsp;</div>
              <div class="gp-tab" ectype="gpTab">
                <ul>
                  <li class="curr"><i class="iconfont icon-mobile-phone"></i><span>手机找回</span></li>
                  <li><i class="iconfont icon-email"></i><span>邮箱找回</span></li>
                </ul>
              </div>
            </div>
            <div class="gp-content" ectype="gpContent">
              <div class="gp-warp formPhone" style="display:block;">
                <form action="user.php" method="post" name="getPhonePassword" ectype="form">
                  <div class="item">
                    <div class="item-label">手 机 号 码</div>
                    <div class="item-info"><input type="text" name="mobile_phone" id="mobile_phone" class="text"
                                                  autocomplete="off" placeholder="绑定手机"/></div>
                    <div class="input-tip error" id="phone_notice"></div>
                  </div>
                  <div class="item">
                    <div class="item-label">手机验证码</div>
                    <div class="item-info phone_code">
                      <input name="sms_value" id="sms_value" type="hidden" value="sms_find_signin" autocomplete="off"/>
                      <input type="text" id="sms" name="mobile_code" class="text text-2" maxlength="6" value=""
                             autocomplete="off" placeholder="手机动态码"/>
                      <input type="button" onclick="sendSms();" value="获取验证码" id="zphone" class="sms-btn">
                    </div>
                    <div class="input-tip"></div>
                  </div>
                  <div class="item item2 item-button">
                    <input type="hidden" name="flag" id="flag" value='forget' autocomplete="off"/>
                    <input type="hidden" name="seccode" id="seccode" value="" autocomplete="off"/>
                    <input type="hidden" name="act" value="get_pwd_mobile" autocomplete="off"/>
                    <input type="submit" name="submit" id="get-phone-submit" value="提&nbsp;交" class="btn sc-redBg-btn"
                           ectype="submitBtn">
                  </div>
                </form>
              </div>
              <div class="gp-warp formEmail">
                <form action="<?php echo url('member/account/sendPwEmail'); ?>" method="post" name="getEmailPassword" ectype="form">
                  <div class="item">
                    <div class="item-label">用　户　名</div>
                    <div class="item-info"><input type="text" name="user_name" class="text" placeholder="用户名"
                                                  autocomplete="off"/></div>
                    <div class="input-tip"></div>
                  </div>
                  <div class="item">
                    <div class="item-label">邮 箱 账 号</div>
                    <div class="item-info"><input type="text" name="email" id="email" class="text" placeholder="电子邮箱"
                                                  autocomplete="off"/></div>
                    <div class="input-tip"></div>
                  </div>

                  <div class="item item2 item-button">
                    <input type="submit" name="submit" id="get-phone-submit" value="提&nbsp;交" class="btn sc-redBg-btn"
                           ectype="submitBtn">
                  </div>
                </form>
              </div>

              <div class="gp-warp formWenti" ectype="gpwarpLast" style="display:none;">
                <form action="user.php" method="post" name="getWentiPassword" ectype="form">
                  <div class="item">
                    <div class="item-label">用　户　名</div>
                    <div class="item-info"><input name="user_name" type="text" class="text" value="" placeholder="用户名"
                                                  autocomplete="off"/></div>
                    <div class="input-tip"></div>
                  </div>
                  <div class="item item2 item-button">
                    <input type="hidden" name="act" value="check_answer" autocomplete="off"/>
                    <input type="submit" name="submit" value="提&nbsp;交" class="btn sc-redBg-btn" ectype="submitBtn">
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
<script type="text/javascript">
  $(function () {
    //调用jquery中的插件cookie插件进行判断防止刷新倒计时
    if ($.cookie('total') != undefined && $.cookie('total') != 'NaN' && $.cookie('total') != 'null') {
      timekeeping();
    } else {
      $('#zphone').attr('disabled', false);  //按钮设置为禁用
    }
  });
</script>
<div class="footer user-footer">
  <div class="dsc-copyright">
    <div class="w w1200">

      <p class="footer-ecscinfo pb10">

        <a href="index.php">首页</a>

        |


        <a href="article.php?id=2">隐私保护</a>

        |


        <a href="article.php?id=4">联系我们</a>

        |


        <a href="article.php?id=1">免责条款</a>

        |


        <a href="article.php?id=5">公司简介</a>

        |


        <a href="merchants.php" target="_blank">商家入驻</a>

        |


        <a href="message.php">意见反馈</a>


      </p>

      <p class="footer-otherlink">
        <a href="http://www.ecmoban.com" target="_blank" title="模板堂">模板堂</a>

        |

        <a href="http://www.ecjia.com" target="_blank" title="ECJia">ECJia</a>

        |

        <a href="http://www.ectouch.cn" target="_blank" title="ECTouch">ECTouch</a>

        |

        <a href="http://help.ecmoban.com" target="_blank" title="电商学院">电商学院</a>

      </p>

      <p class="copyright_info">ICP备案证书号:<a href="http://www.miibeian.gov.cn/" target="_blank">DSC00000123</a> POWERED
        BY<a href="http://www.dscmall.cn/" target="_blank">大商创</a>2.0</p>
    </div>
  </div>


  <div class="hidden">
    <input type="hidden" name="seller_kf_IM" value="" rev="" ru_id=""/>
    <input type="hidden" name="seller_kf_qq" value="349488953"/>
    <input type="hidden" name="seller_kf_tel" value="4000-000-000"/>
    <input type="hidden" name="user_id" value="0"/>
  </div>
</div>

<script type="text/javascript" src="/shop/public/static/index/js/scroll_city.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/user.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/user_register.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/utils.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/sms.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/dsc-common.js"></script>
<script type="text/javascript" src="/shop/public/static/index/js/jquery.purebox.js"></script>
<script type="text/javascript">
  $(function () {
    if (document.getElementById("seccode")) {
      $("#seccode").val(0);
    }

    //找回密码方式切换
    $("*[ectype='formWarp']").slide({
      titCell: "*[ectype='gpTab'] li",
      mainCell: "*[ectype='gpContent']",
      effect: "fade",
      trigger: "click",
      titOnClassName: "curr"
    });


    //注册问题下拉
    $.divselect("#divselect", "#passwd_quesetion");
  });
</script>
</body>
</html>

