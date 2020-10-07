<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Detail extends Controller
{
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
     * @param \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function read($id)
    {
        $homestay = Db::table('homestay')->where('hid', '=', $id)->find();
        //出去当前详细页面的民宿 然后获取最新的创建的四条民宿信息
        $recommendWhere = [];
        $recommend = Db::table('homestay')->where('hid', '<>', $id)->field('hid,hname,hcity,harea,hprice,hscore,hthumb')->order('htime', 'desc')->limit(0, 4)->select();
        if ($recommend && $homestay) {
            return json([
                'code' => 200,
                'msg' => '数据获取成功',
                'data' => [
                    'homestay' => $homestay,
                    'recommend' => $recommend,
                ]
            ]);
        } else {
            return json([
                'code' => 404,
                'msg' => '获取失败',
                'data' => [
                    'homestay' => $homestay,
                    'recommend' => $recommend,
                ]
            ]);
        }

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request
     * @param int $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
