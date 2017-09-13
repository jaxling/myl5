<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function init()
    {
        Request::get();
    }
    //列表页
    public function index()
    {
        $list = [
            [
                'id' => 1,
                'title' => 'title1',
                'nick_name' => 'ling1',
                'content' => 'content1',
                'create_time' => date("Y-m-d"),
            ],
            [
                'id' => 2,
                'title' => 'title2',
                'nick_name' => 'ling2',
                'content' => 'content2',
                'create_time' => date("Y-m-d"),
            ],
            [
                'id' => 3,
                'title' => 'title3',
                'nick_name' => 'ling3',
                'content' => 'content3',
                'create_time' => date("Y-m-d"),
            ],
        ];
        $hot_ask = [];
        return view("post/index", compact('list', 'hot_ask'));
    }

    //详情页
    public function show()
    {
        $model = 1;
        return view("post/show", [
            'model' => $model,
        ]);
    }

    //创建页面
    public function create()
    {
        return view("post/create", [
            'model' => '',
        ]);
    }

    //创建逻辑
    public function store()
    {

    }

    //编辑
    public function edit()
    {

    }

    //编辑逻辑
    public function update()
    {

    }

    //删除逻辑
    public function delete()
    {

    }
}
