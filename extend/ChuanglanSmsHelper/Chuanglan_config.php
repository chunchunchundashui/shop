<?php
namespace ChuanglanSmsHelper;
//创蓝发送短信接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
$chuanglan_config['api_send_url'] = 'http://smssh1.253.com/msg/send/json';

//创蓝变量短信接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
$chuanglan_config['API_VARIABLE_URL'] = 'http://xxx/msg/variable/json';

//创蓝短信余额查询接口URL, 请求地址请参考253云通讯自助通平台查看或者询问您的商务负责人获取
$chuanglan_config['api_balance_query_url'] = 'http://xxx/msg/balance/json';
//创蓝账号 替换成你自己的账号
$chuanglan_config['api_account']	= '000';

//创蓝密码 替换成你自己的密码
$chuanglan_config['api_password']	= '000';