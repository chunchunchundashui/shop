<?php

use think\Db;

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//cookie加密或解密 type 0:加密  1:解密  12345645612
function encryption($value, $type = 0){
//    这是加密的值,我们将下面的加密放到了tp5中配置文件config  'encryption_key' 这个名称
//    $key = md5('www.yccpanda.com');
    $key = config('encryption_key');
//    进行一个一枚或加密
    if ($type == 0) {    // 加密
//        一枚或加密 $value ^ $key ,在经过base64位加密
        return str_replace('=','', base64_encode($value ^ $key));
    }else {
//        对base64进行解密
        $value = base64_decode($value);
//        一枚或解密
        return $value ^ $key;
    }
}


//图片资源处理函数
function my_scandir($dir = UEDITOR)
{
    $files = array();
    $dir_list = scandir($dir);      /* scandir列出指定路径中的文件和目录 */
    foreach ($dir_list as $file) {
        if ($file != '.' && $file != '..') {
            if (is_dir($dir . '/' . $file)) {      /*  $dir.'/'.$file 存在的目录就是一个文件夹   递归方法 */
                $files['$file'] = my_scandir($dir . '/' . $file);
            } else {
                $files[] = $dir . '/' . $file;
            }
        }
    }
    return $files;
}


//字符串截取
function cut_str($sourcestr, $cutlength)
{
    $returnstr = '';
    $i = 0;
    $n = 0;
    $str_length = strlen($sourcestr);//字符串的字节数
    while (($n < $cutlength) and ($i <= $str_length)) {
        $temp_str = substr($sourcestr, $i, 1);
        $ascnum = Ord($temp_str);//得到字符串中第$i位字符的ascii码
        if ($ascnum >= 224)    //如果ASCII位高与224，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
            $i = $i + 3;            //实际Byte计为3
            $n++;            //字串长度计1
        } elseif ($ascnum >= 192) //如果ASCII位高与192，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
            $i = $i + 2;            //实际Byte计为2
            $n++;            //字串长度计1
        } elseif ($ascnum >= 65 && $ascnum <= 90) //如果是大写字母，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1;            //实际的Byte数仍计1个
            $n++;            //但考虑整体美观，大写字母计成一个高位字符
        } else                //其他情况下，包括小写字母和半角标点符号，
        {
            $returnstr = $returnstr . substr($sourcestr, $i, 1);
            $i = $i + 1;            //实际的Byte数计1个
            $n = $n + 0.5;        //小写字母和半角标点等与半个高位字符宽…
        }
    }
    if ($str_length > $i) {
        $returnstr = $returnstr . "…";//超过长度时在尾处加上省略号
    }
    return $returnstr;
}

//  前台注册验证发送
function mel($toemail, $code)
{
    Vendor('phpmailer.phpmailer');
    $mail = new \phpmailer\PHPMailer(); //实例化
    $mail->isSMTP();// 使用SMTP服务
    $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
    $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址
    $mail->SMTPAuth = true;// 是否使用身份验证
    $mail->Username = "chunchunsinger@163.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
    $mail->Password = 'NPCSQEFRJRDMOTBA';// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
    $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
    $mail->Port = 994;// 163邮箱的ssl协议方式端口号是465/994
    $mail->setFrom("chunchunsinger@163.com", "PHP-商城注册");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
    $mail->addAddress($toemail, '博客回复消息');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
    $mail->addReplyTo("chunchunsinger@163.com", "春春春");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
    //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
    //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
    //$mail->addAttachment("bug0.jpg");// 添加附件
    $mail->Subject = "PHP-商城邮箱验证码";// 邮件标题
    $mail->Body = "您的验证码为:" . $code;// 邮件正文
    //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

    if (!$mail->send()) {// 发送邮件
//             echo 22;
        return $mail->ErrorInfo;
        // echo "Message could not be sent.";
        // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
    } else {
        return 1;
    }
}

//  前台修改密码发送
function emai($toemail, $code)
{
    Vendor('phpmailer.phpmailer');
    $mail = new \phpmailer\PHPMailer(); //实例化
    $mail->isSMTP();// 使用SMTP服务
    $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
    $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址
    $mail->SMTPAuth = true;// 是否使用身份验证
    $mail->Username = "chunchunsinger@163.com";// 发送方的163邮箱用户名，就是你申请163的SMTP服务使用的163邮箱</span><span style="color:#333333;">
    $mail->Password = 'NPCSQEFRJRDMOTBA';// 发送方的邮箱密码，注意用163邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码！</span><span style="color:#333333;">
    $mail->SMTPSecure = "ssl";// 使用ssl协议方式</span><span style="color:#333333;">
    $mail->Port = 994;// 163邮箱的ssl协议方式端口号是465/994
    $mail->setFrom("chunchunsinger@163.com", "PHP-商城注册");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@163.com），Mailer是当做名字显示
    $mail->addAddress($toemail, '博客回复消息');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@163.com)
    $mail->addReplyTo("chunchunsinger@163.com", "春春春");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
    //$mail->addCC("xxx@163.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
    //$mail->addBCC("xxx@163.com");// 设置秘密抄送人(这个人也能收到邮件)
    //$mail->addAttachment("bug0.jpg");// 添加附件
    $mail->Subject = "PHP-商城邮箱验证码";// 邮件标题
    $mail->Body = "您的新密码为:" . $code . "请妥善保管";// 邮件正文
    //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

    if (!$mail->send()) {// 发送邮件
//             echo 22;
        return $mail->ErrorInfo;
        // echo "Message could not be sent.";
        // echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
    } else {
        return 1;
    }
}




// 发送手机验证码
function sendsms($tel)
{
    try {
// 请根据实际 appid 和 appkey 进行开发，以下只作为演示 sdk 使用
        $appid = '1400379804';
        $appkey = "94b79bff214e3caae16f12de99336b46";
        $templId = '625562';
        $smsSign = '岳长春学习测试';
//$phoneNumber1 = $tel;
        $singleSender = new \sms\SmsSingleSender($appid, $appkey);
// 指定模板单发
// 假设模板内容为：测试短信，{1}，{2}，{3}，
// $mobilelz=$this->generate_code();//生成验证码
        $mobilelz = rand(100000, 999999);//生成验证码
//把手机号码和验证码写入数据库
        $where['mobile'] = $tel;

        $user = Db::name('mobile')->where($where)->find();
        if (!$user) {
            $member['mobile'] = $tel;
            $member['mobilelz'] = $mobilelz;
            $member['credate'] = date('Y-m-d H:i:s');//创建时间
            $member['enddate'] = date('Y-m-d H:i:s', strtotime('+180 second'));//验证码失效时间
            $mobid = db('mobile')->insert($member,false,true);//没有登记就写入
            if ($mobid) {//写入库成功才到验证码发送出去
                $params = array($mobilelz);//我申请的短信模板只有两个参数 $mobilelz这个是生成的随机验证码 “3” 收到短信上显示3分钟后失效
                $result = $singleSender->sendWithParam("86", $member['mobile'], $templId, $params, $smsSign, "", "");
                $rsp = json_decode($result,true);
                if ($rsp['result'] != 0) {//放送失败的话
                    Db::name('mobile')->where('mobile', $tel)->delete();
                    return false;
                } else {
//                    记录手机短信验证码
                    session('mobileCode', $mobilelz);
                    return true; //返回短信信息
                }
            } else {
                return false;
            }

        } elseif ((date('Y-m-d H:i:s') > $user['enddate'])) {//当前时候大于失效时间
            Db::name('mobile')->where('mobile', $tel)->delete();
            return false;
        }
    } catch (\Exception $e) {
        echo var_dump($e);
    }
}