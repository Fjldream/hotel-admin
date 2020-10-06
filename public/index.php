<?php
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
//服务器端允许跨域
//该资源可以被任意外域访问 * 任意的域名都可以跨域请求
//该资源仅允许来自 http://foo.example 访问
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:PUT,POST,GET,DELETE,OPTIONS");
header("Access-Control-Allow-Headers:X-Requested-With,content-type, Authorization,x-access-token,token,retry-after");

//预设请求 先发options请求 判断是否有权限
if($_SERVER['REQUEST_METHOD']==='OPTIONS'){
    exit();
}
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
