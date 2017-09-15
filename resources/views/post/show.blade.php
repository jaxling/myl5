@extends("layout.main")

@section("content")
<h4><a href="/posts"><i class="iconfont">&#xe679;</i>&nbsp;返回</a></h4>
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        @if (isset($post))
            <h2 class="page-header">
                {{$post->title}}&nbsp;
                <a href="/posts/{{$post->id}}/edit"><i class="iconfont">&#xe6f9;</i></a>
                    <a href="/posts/{{$post->id}}/delete"><i class="iconfont">&#xe645;</i></a>
                <!-- <small>副标题</small> -->
            </h2>

            <!-- First Blog Post -->
            <p class="lead">{{date('Y-m-d H:i', strtotime($post->created_at))}}</p>
            <!-- <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
            <hr>
            <p>
                {!! $post->content !!}
            </p>
            <hr>
        @endif
    </div>

    @include("layout.right")

</div>
@endsection
