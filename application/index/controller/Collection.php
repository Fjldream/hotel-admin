<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Collection extends Controller
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
        checkUserToken();
        $data = $this->request->get();
        $result = Db::table('homestay')->field('hid,hname,hscore,hcity,harea,hprice,hthumb')->where('hid','IN',$data)->select();
        if($result){
            return json([
                'code'=>$this->code['success'],
                'msg'=>'查询成功',
                'data'=>$result
            ]);
        }else{
            return json([
                'code'=>$this->code['fail'],
                'msg'=>'暂无数据',
            ]);
        }

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
        checkUserToken();
        $id = $this->request->userid;
        $data = $this->request->post();
//        var_dump($id);
//        var_dump($data);
        //$id = $data['userid'];
        $collection = $data['collection'];
       $result = Db::table('user')->where('userid','=',$id)->update(['collection'=>$collection]);
        if($result){
            return json([
                'code'=>$this->code['success'],
                'msg'=>'更新数据成功'
            ]);
        }else{
            return json([
                'code'=>$this->code['fail'],
                'msg'=>'更新数据失败'
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
