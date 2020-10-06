<?php
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
/*
 * 1. 获取token
 * 1.1 GET-> token
 * 1.2 POST-> token
 * 1.3 header-> token
 * 2. 解析token JWT::verify
 * 2.1 解析成功-> 处理业务逻辑
 * 2.2 解析失败-> 返回错误信息
 * */

use think\JWT;

function checkToken()
{
    $get_token = request()->get('token');
    $post_token = request()->post('token');
    $header_token = request()->header('token');

    if ($get_token) {
        $token = $get_token;
    } else if ($post_token) {
        $token = $post_token;

    } else if ($header_token) {
        $token = $header_token;
    } else {
        //401 授权失败
        json([
            'code' => 404,
            'msg' => 'token不能为空'
        ], 401)->send();
        exit();
    }
    //解析token方法
    $tokenResult = JWT:: verify($token, config('jwtkey'));
    // var_dump($tokenResult);
    if (!$tokenResult) {
        json([
            'code' => 404,
            'msg' => 'token验证失败'
        ], 401)->send();
        exit();
    }
    request()->id = $tokenResult['id'];
    request()->username = $tokenResult['username'];

}

function password($pass)
{
    return md5(crypt($pass, config('salt')));
}

function resetPassword()
{
    return md5(crypt(config('defaultpassword'), config('salt')));
}