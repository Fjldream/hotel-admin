<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class User extends Controller
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
        //验证规则
        $data['password'] = md5(crypt($data['password'],config('salt')));
        $data['nickname'] = '小一'.time();
        $model = model('User');
        $result = $model->add($data);
        if($result){
            return json([
                'code'=>$this->code['success'],
                'msg'=>'注册成功'
            ]);
        }else{
            return json([
                'code'=>$this->code['fail'],
                'msg'=>'注册失败,请稍后再试'
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
        //id从token里面拿
        checkUserToken();
        //payload 的负载为了带数据
        $userid = $this->request->userid;
        $model = model('User');
        $result = $model->queryOne(['userid'=>$userid],"userid,nickname,avatar,phone,collection");
        if($result){
            return json([
                'code'=>$this->code['success'],
                'msg'=>'数据获取成功',
                'data'=>$result
            ]);
        }else{
            return json([
                'code'=>$this->code['fail'],
                'msg'=>'数据获取失败'
            ]);
        }
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
