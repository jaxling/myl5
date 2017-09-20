<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Comment;
use \App\Post;
use \App\Zan;

class PostController extends Controller
{
    //列表页
    public function index()
    {
        $list = Post::orderBy("created_at", 'desc')->withCount(['comments', 'zans'])->paginate(10);

        //carbon 时间对象
        //$list[0]->created_at->toFormattedDateString();

        $hot_ask = [];
        return view("post/index", compact('list', 'hot_ask'));
    }

    //详情页
    public function show(Post $post)
    {
        $post->load('comments');
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

        $user_id = \Auth::id();
        $params = array_merge(request(['title', 'content']), compact('user_id'));
        $post = Post::create($params);
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

        $this->authorize('update', $post);

        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        return redirect("/posts/{$post->id}");
    }

    //删除逻辑
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

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

    //提交评论
    public function comment(Post $post)
    {
        //验证
        $this->validate(request(), [
            'content' => 'required|min:3',
        ]);

        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content = request('content');
        $post->comments()->save($comment);

        //渲染
        return back();
    }

    //赞
    public function zan(Post $post)
    {
        $params = [
            'user_id' => \Auth::id(),
            'post_id' => $post->id,
        ];

        Zan::firstOrCreate($params);
        return back();
    }

    //取消赞
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }

}
