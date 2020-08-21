<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/6/7
 * Time: 13:12
 */
namespace app\member\model;

use think\Cookie;
use think\Model;

class User extends Model
{
    public function login($data,$type = 0,$backAct="#")
    {
        $userData = array();
        // trim去除收尾的空格
        $userData['username'] = trim($data['username']);
        $userData['password'] = md5($data['password']);
        // 验证用户名或者邮箱或者手机号是否存在
        $users = db('user')->where(array('username' => $userData['username']))->whereOr(array('email' => $userData['username']))->whereOr(array('mobile_phone' => $userData['username']))->find();
        if ($users) {
            if($users['password'] == $userData['password']) {
                session('uid', $users['id']);
                session('username', $users['username']);
//                写入会员等级折扣率
                $points = $users['points'];
                $memberLevel = db('member_level')->where('bom_point','<=',$points)->where('top_point','>=',$points)->find();
                session('level_id',$memberLevel['id']);     // 等级id
                session('level_rate',$memberLevel['rate']);    //等级的折扣率
//                写入Cookie
                if (isset($data['remember'])) {
                    $aMonth = 30*24*60*60;
                    $username = encryption($users['username'],0);
                    $password = encryption($data['password'],0);
                    cookie('username', $username, $aMonth, '/');
                    cookie('password', $password, $aMonth, '/');
                }
                $arr = [
                    'error' => 0,
                    'message' => "",
//                    'url' => $backAct,
                ];
                if ($type == 1) {
                    return $arr;
                }else{
                    return json($arr);
                }
            }else {
                $arr = [
                    'error' => 1,
                    'message' => "<i class='iconfont icon-minus-sign'></i>用户名或者密码错误",
                ];
                if ($type == 1) {
                    return $arr;
                }else{
                    return json($arr);
                }
            }
        }else {
            $arr = [
                'error' => 1,
                'message' => "<i class='iconfont icon-minus-sign'></i>用户名或者密码错误",
            ];
            if ($type == 1) {
                return $arr;
            }else{
                return json($arr);
            }
        }
    }

    //    退出
    public function loginOut()
    {
//        没有勾选默认登陆就会清除session
        session(null);
        //        勾选默认登陆就会清除Cookie
        cookie('username', null);
        cookie('password', null);
    }
}