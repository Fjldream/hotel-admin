<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\JWT;
use think\Request;

class Login extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->code = config('code');
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data = $this->request->post();
        // phone code
        $model = model('User');
        $result = $model->queryOne(['phone'=>$data['phone']]);
        if($result){
            $payload = [
                'userid' =>$result['userid'],
                'nickname' => $result['nickname'],
                'avatar' => $result['avatar'],
            ];
            $token = JWT::getToken($payload,config('jwtkey'));
            return json([
                'code'=>$this->code['success'],
                'msg'=>'登录成功',
                'token'=>$token,
            ]);
        }else{
            return json([
                'code'=>$this->code['fail'],
                'msg'=>'用户名不存在'
            ]);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
