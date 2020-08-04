<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//使用路由简化url地址
//               Route::rule('路由表达式','路由地址','请求类型','路由参数（数组）','变量规则（数组）');
//栏目路由
Route::rule('cate/:id','index/Cate/index','get',['ext'=>'html|htm'],['id'=>'\d{1,3}']);     // 正则表达式\d{1,3}三个数组内
//  文章详情页路由
Route::rule('article/:id','index/Article/index','get',['ext'=>'html|htm'],['id'=>'\d{1,3}']);     // 正则表达式\d{1,3}三个数组内
//首页路由
Route::rule('index','index/Index/index','get',['ext'=>'html|htm']);     // 正则表达式\d{1,3}三个数组内

//对栏目二级三级分类的路由
Route::rule('category/:id','index/Category/index','get',['ext'=>'html|htm'],['id'=>'\d{1,3}']);     // 正则表达式\d{1,3}三个数组内

Route::rule('flow1', 'index/Flow/flow1','get', ['ext'=>'html|htm']);
Route::rule('goods/:id','index/Goods/index','get',['ext'=>'html|htm'],['id'=>'\d{1,3}']);     // 正则表达式\d{1,3}三个数组内