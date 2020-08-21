<?php


/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 21:33
 */

namespace app\member\controller;

use Oauth;
use sms\SmsMultiSender;
use sms\SmsSenderUtil;
use sms\SmsSingleSender;
use app\index\controller\Base;


class Account extends Base
{
    //    第三方登陆QQ
    public function QqLogin()
    {
        $oauth = new Oauth();
        $oauth->qq_login();
    }

    // 注册
    public function reg()
    {
        if (request()->isAjax()) {
            $data = input('post.');
            $validate = validate('User');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            if ($data['register_type'] == 0) {
                if (!empty($data['send_code'])) {
                    if ($data['send_code'] != session('emailCode')){
                        $this->error('验证码不正确');
                    }
                }else {
                    $this->error('邮箱验证码不能为空');
                }
            }elseif ($data['register_type'] == 1) {
                if (!empty($data['mobile_code'])) {
                    if ($data['mobile_code'] != session('mobileCode')){
                        $this->error('验证码不正确');
                    }
                }else {
                    $this->error('手机验证码不能为空');
                }
            }
            $userData  = array();
            $userData['username'] = $data['username'];
            if ($data['confirm_password'] == $data['password']){
                $userData['password'] = md5($data['password']);
            }else {
                $this->error('两次密码不统一');
            }
            $userData['email'] = $data['email'];
            $userData['mobile_phone'] = $data['mobile_phone'];
            $userData['register_type'] = $data['register_type'];
            $userData['create_time'] = time();
            $add = db('user')->insert($userData);
            if ($add) {
                $result = $this->login(1);         // 注册成功后自动登录系统
                if ($result['error'] == 0) {
                    $this->success('注册成功,正在跳转...', 'member/User/index');
                }else {
                    $this->success('注册成功,正在跳转...', 'member/User/index');
                }
            }else {
                $this->error('注册失败');
            }
        }
        return view();
    }

     // 登陆   type=0说明需要给客服端返回json对象, type=1说明要为服务端返回数组类型
    public function login($type=0)
    {
        if (request()->isPost()) {
            $data = input('post.');
//            $backAct = $data['back_cat'];
            return model('User')->login($data);
        }
        return view();
    }

//    使用ajax异步判断用户是否登陆
    public function checkLogin()
    {
        $uid = session('uid');
        if ($uid) {
            $arr['error'] = 0;
            $arr['uid'] = $uid;
            $arr['username'] = session('username');
            return json($arr);
        }else{
//            判断cookie是否存在
            if (cookie('username') && cookie('password')) {
                $data['username'] = encryption(cookie('username'),1);
                $data['password'] = encryption(cookie('password'),1);
                $loginRes = model('user')->login($data,1);
                if ($loginRes['error'] == 0) {
                    $arr['error'] = 0;
                    $arr['uid'] = $uid;
                    $arr['username'] = session('username');
                    return json($arr);
                }
            }
            $arr = array();
            $arr['error'] = 1;
            return json($arr);
        }
    }

// 异步判断手机号码不能为空,格式是否正确
    public function sendSms()
    {
        if (request()->isAjax()) {
            $mobile = input('phoneNum');
            if(!empty($mobile)) {
//                判断手机号格式是否正确
                if (preg_match("/^1[3|4|5|7|8][0-9]{9}$/", $mobile)) {
//                发送到common.php下面的sendsms函数
                    $data = sendsms($mobile);
                    if ($data == 1){
                        $this->success('短信发送成功');
                    }else {
                        $this->error('短信发送失败');
                    }
                }else {
                    $this->error('号码格式不正确');
                }
            }else{
                $this->error('手机号不能为空');
            }
        }else {
            $this->error('非法请求');
        }
    }
    
//     异步发送邮件
    public function sendEmail()
    {
        if (request()->isAjax()) {
            $email = input('email');
//            判断邮箱不能为空
            if (!empty($email)) {
//                判断邮箱格式是否正确
                if (preg_match("/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i", $email)) {
                    $code = rand(100000,999999);
                    $result = mel($email, $code);
                    if ($result) {
//                      记录邮箱验证码
                        session('emailCode',$code);
                        $this->success('邮箱发送成功');
                    }else {
                        $this->error('邮箱发送失败');
                    }
                }else {
                    $this->error('邮箱格式错误');
                }
            }else {
                $this->error('邮箱不能为空');
            }
        }else {
            $this->error('非法请求');
        }
    }

    //    异步验证用户名是否注册
    public function isRegistered()
    {
        if (request()->isAjax()) {
            $username = input('username');
            $usernameInfo = db('user')->where(array('username' => $username))->find();
            if ($usernameInfo) {
                return false;
            }else {
                return true;
            }
        }else {
            $this->error('非法请求');
        }
    }

//    异步验证手机号是否注册
    public function checkPhone()
    {
        if (request()->isAjax()) {
            $mobilePhone = input('mobile_phone');
            $usernameInfo = db('user')->where(array('mobile_phone' => $mobilePhone))->find();
            if ($usernameInfo) {
                return false;
            }else {
                return true;
            }
        }else {
            $this->error('非法请求');
        }
    }


//    异步验证邮箱是否注册
    public function checkEmail()
    {
        if (request()->isAjax()) {
            $mobileEmail = input('email');
            $usernameInfo = db('user')->where(array('email' => $mobileEmail))->find();
            if ($usernameInfo) {
                return false;
            }else {
                return true;
            }
        }else {
            $this->error('非法请求');
        }
    }
    
//    异步验证邮箱验证码
    public function checkdEmailSendCode()
    {
        if (request()->isAjax()) {
            $emailCode = input('send_code');
            if ($emailCode == session('emailCode')) {
                return true;
            }else {
                return false;
            }
        }else {
            $this->error('非法请求');
        }
    }

    //    异步验证手机验证码短信
    public function codeNotice()
    {
        if (request()->isAjax()) {
            $mobileCode = input('mobile_code');
            if ($mobileCode == session('mobileCode')) {
                return true;
            }else {
                return false;
            }
        }else {
            $this->error('非法请求');
        }
    }

//    找回密码
    public function getPassword()
    {
        return view();
    }

//  验证手机号并发送短信找回密码
    public function checkAndSendMsg()
    {
        $data = input('post.');
//            去除两边的空格
        $phoneNum = trim($data['phoneNum']);
        if ($data['phoneNum']) {
            $user = db('user')->where(array('mobile_phone' => $phoneNum))->find();
            if ($user) {
                sendSms($phoneNum);
                $arr['msg'] = '短信发送成功';
                $arr['code'] = 1;
                return json($arr);
            }else{
                $arr['msg'] = '用户不存在!';
                $arr['code'] = 0;
                return json($arr);
            }
        }else {
            $arr['msg'] = '手机号不存在!';
            $arr['code'] = 0;
            return json($arr);
        }
    }

//    找回密码的时候验证验证码是否正确
    public function checkPhoneCode()
    {
        $data = input('post.');
        $mobileCode = trim($data['mobile_code']);
//        那sesssion中存的修改成功后保存的验证码
        $sCode = session('值');
//        拿去已经注册了的手机号,
        $mobilePhone = session('电话');
        if ($sCode == $mobileCode){
            $password = '123456';
            $_password = md5($password);
            $result = db('user')->where(array('mobile_phone' => $mobilePhone))->update(['password'=>$_password]);
            if ($result) {
//                sendsms(2, $_password);
            }else{

            }
        }else{
            return false;
        }
    }


//    通过用户名和邮箱找回密码
    public function sendPwEmail()
    {
        $data = input('post.');
        $userData['username'] = trim($data['user_name']);
        $userData['email'] = trim($data['email']);
//        信息比对查找是否有该用户名,如果有就在查找邮箱,否返回错误
        $user = db('user')->where(array('username' => $userData['username']))->find();
        if ($user) {
            if ($user['email'] == $userData['email']) {
                $password = mt_rand(100000,999999);
                $_password = md5($password);
                $result = db('user')->where(array('email' => $user['email']))->update(['password'=>$_password]);
                if ($result) {
                    $_arr = emai($userData['email'],$password);
                    $arr['msg'] = "修改密码成功";
                }else{
                    $arr['msg'] = "修改密码失败!";
                }
            }else{
                $arr['msg'] = "您填写的电子邮件不匹配,请重新输入!";
            }
        }else{
            $arr['msg'] = "您填写的用户名不匹配,请重新输入!";
        }
        $this->assign([
            'show_right' => 1,      //  文章列表和商品列表头部偏移判断
            'msg' => $arr['msg'],
        ]);
        return view('index@common/tip_info');
    }
}