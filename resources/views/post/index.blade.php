@extends("layout.main")

@section("content")
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if ($list)
            @foreach ($list as $k => $v)
                <h4>
                    <a href="/posts/{{$v->id}}" target="_blank">{{$v['title']}}</a>&nbsp;
                    <a href="/posts/{{$v->id}}/edit"><i class="iconfont">&#xe6f9;</i></a>
                    <a href="/posts/{{$v->id}}/delete"><i class="iconfont">&#xe645;</i></a>
                </h4>

                <p class="lead" style="font-size:14px"><?=date('Y-m-d H:i', strtotime($v->created_at));?></p>

                <p>{!! str_limit($v->content,'200','...') !!}</p>

                <a class="btn btn-primary" href="/posts/{{$v->id}}" target="_blank"><i class="iconfont">&#xe73d;</i>&nbsp;查看</a>

                <hr></br>
            @endforeach
        @else
            <br/>
            <p class="lead">没有记录~</p><a href="/posts">返回</a>
        @endif

        {{$list->links()}}

    </div>

    <!-- Blog Sidebar Widgets Column -->
    @include("layout.right")

</div>
<hr>
@endsection