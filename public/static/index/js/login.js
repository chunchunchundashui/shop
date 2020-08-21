$(function () {
  $.ajax({
    type: 'get',
    url: checkLogin,
    dataType: 'json',
    success: function (data) {
      if (data.error == 0) {

        var html="<span>您好 &nbsp;<a href='#'>"+data.username+"</a></span><span>，欢迎来到&nbsp;<a alt='首页' title='首页' href=''>学习专用</a></span><span>[<a href='javascript:;' id='loginOut'>退出</a>]</span>";
        $("#ECS_MEMBERZONE").html(html);
        // <!-- 退出ajax -->
        $('#loginOut').click(function () {
          $.ajax({
            url:loginOut,
            type:'post',
            data:$('form').serialize(),
            dataType:'json',
            success:function (data) {
              if (data.code == 1) {
                layer.msg(data.msg, {icon: 6,time: 1000,}, function () {location.href = data.url;});
              }else {layer.msg(data.msg, {content: data.msg,icon: 5,time: 2000});}
            }
          });
          return false;
        });
        //  ajax退出结束
      }else{
        var html="<a href='/shop/index.php/member/account/login.html' class='link-login red'>请登录</a><a href='/shop/index.php/member/account/reg.html' class='link-regist'>免费注册</a>";
        $("#ECS_MEMBERZONE").html(html);
      }
    }
  });
  cartGoodsNum();
});

function cartGoodsNum(){
    $.ajax({
      type: 'post',
      url: cart_goods_num,
      dataType: 'json',
      success: function (data) {
        $('#cart_goods_num').text(data.cart_goods_num);
      }
    });
}