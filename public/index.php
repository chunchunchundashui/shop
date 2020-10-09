<?php
header("Content-type:text/html;charset=utf-8");
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
//define('PAY_PLUS', __DIR__ . '/application/../');
define('IMG_UPLOADS', __DIR__ . '/public/static/uploads/');      /*定义的一个常量*/
define('UEDITOR', __DIR__ . '/../ueditor');          /*  定义一个ueditor常量在www目录下存放图片   */
define('HTTP_UEDITOR', '/ueditor');
define('DEL_UEDITOR', __DIR__ . '/../.');           /*  获取到图片地址设置一个常量准备删除   */
// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';
