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

use \think\Route;
//为资源控制器添加路由
Route::resource('api/Homestay','admin/Homestay');
Route::resource('index/detail','index/Detail');
Route::resource('index/user','index/User');
Route::resource('index/lists','index/Lists');
Route::resource('index/login','index/Login');
Route::resource('index/orders','index/Orders');
Route::resource('index/collection','index/Collection');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
