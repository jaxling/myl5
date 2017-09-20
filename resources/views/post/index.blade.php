@extends("layout.main")

@section("content")
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if ($list)
            @foreach ($list as $k => $v)
                <h4>
                    <a href="/posts/{{$v->id}}" target="_blank">{{$v['title']}}</a>&nbsp;
                    @can('update',$v)
                        <a href="/posts/{{$v->id}}/edit"><i class="iconfont">&#xe6f9;</i></a>
                    @endcan
                    @can('delete', $v)
                        <a href="/posts/{{$v->id}}/delete"><i class="iconfont">&#xe645;</i></a>
                    @endcan
                </h4>

                <p style="color:#9d9d9d;margin-bottom:15px;">{{ $v->created_at->toFormattedDateString() }}
                    @if($v->user)
                        by {{ $v->user->name }}
                    @endif
                </p>

                <p>{!! str_limit($v->content,'200','...') !!}</p>
                <p style="color:#9d9d9d;margin-top:20px">赞 {{ $v->zans_count }} | 评论 {{ $v->comments_count }}</p>

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
