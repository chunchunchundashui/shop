<?php
/**
 * Created by PhpStorm.
 * User: 春春春
 * Date: 2020/5/27
 * Time: 0:24
 */
require_once 'Connect2.1/qqConnectAPI.php';

//访问QQ登陆页面
$oauth = new Oauth();
$oauth->qq_login();

?>
