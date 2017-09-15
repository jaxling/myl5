<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    //列表页
    public function index()
    {
        $list = Post::orderBy("created_at", 'desc')->paginate(10);

        //carbon 时间对象
        //$list[0]->created_at->toFormattedDateString();

        $hot_ask = [];
        return view("post/index", compact('list', 'hot_ask'));
    }

    //详情页
    public function show(Post $post)
    {
        return view("post/show", compact('post'));
    }

    //创建页面
    public function create()
    {
        return view("post/create");
    }

    //创建逻辑
    public function store()
    {
        //dd(\Request::all());
        //dd(request()->all());
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ], [
            'title.min' => '文章标题过短',
        ]);

        //$params = ['title' => request("title")];
        $post = Post::create(request(['title', 'content']));
        return redirect("/posts");
    }

    //编辑
    public function edit(Post $post)
    {
        return view("post/edit", compact('post'));
    }

    //编辑逻辑
    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ], [
            'title.min' => '文章标题过短',
        ]);

        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        return redirect("/posts/{$post->id}");
    }

    //删除逻辑
    public function delete(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }

    //上传图片
    public function upload(Request $request)
    {
        //dd(request()->all());
        $path = $request->file('wangEditor_h5')->storePublicly(md5(time()));
        return json_encode(['url' => asset('storage/' . $path)]);
    }
}
