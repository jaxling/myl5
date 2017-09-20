@extends("layout.main")

@section("content")
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        @if (isset($post))
            <h2 class="page-header" style="font-size:24px;">
                {{ $post->title }}&nbsp;

                @if(!$post->zan(\Auth::id())->exists())
                    <a style="color:#000" href="/posts/{{$post->id}}/zan"><i class="iconfont">&#xe600;</i></a>
                @else
                    <a style="color:red" href="/posts/{{$post->id}}/unzan"><i class="iconfont">&#xe600;</i></a>
                @endif

                @can('update',$post)
                    <a href="/posts/{{$post->id}}/edit"><i class="iconfont">&#xe6f9;</i></a>
                @endcan
                @can('delete', $post)
                    <a href="/posts/{{$post->id}}/delete"><i class="iconfont">&#xe645;</i></a>
                @endcan
                <!-- <small>副标题</small> -->
            </h2>

            <!-- First Blog Post -->
            <p class="lead" style="font-size: 16px;">{{ $post->created_at->toFormattedDateString() }}
                @if($post->user)
                    by {{ $post->user->name }}
                @endif
            </p>
            <!-- <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
            <hr>
            <p>
                {!! $post->content !!}
            </p>
            <hr>

            @if($post->comments)
                <div class="panel panel-default">
                    <div class="panel-heading">评论(0)</div>
                    <ul class="list-group">

                        @foreach($post->comments as $com)
                            <li class="list-group-item">
                                <h5 style="color:#9d9d9d">{{ $com->created_at->toFormattedDateString() }}
                                    @if($com->user)
                                        by {{ $com->user->name }}
                                    @endif
                                </h5>
                                <div>{{ $com->content }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">发表评论</div>
                <ul class="list-group">
                    <form action="/posts/{{$post->id}}/comment" method="POST">
                        {{ csrf_field() }}
                        <li class="list-group-item">
                            <textarea name="content" class="form-control" rows="6"></textarea>
                            <button class="btn btn-default" type="submit" style="margin-top:10px;">提交</button>
                        </li>
                    </form>
                </ul>
            </div>
        @endif
    </div>

    @include("layout.right")

</div>
@endsection
