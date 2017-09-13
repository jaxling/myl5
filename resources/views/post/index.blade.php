@extends("layout.main")

@section("content")
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
        @if ($list)
            @foreach ($list as $k => $v)
                <h4>
                    <a href="/posts/{{$v['id']}}" target="_blank">{{$v['title']}}</a>
                </h4>

                <p class="lead"><?=$v['nick_name'];?><span class="glyphicon glyphicon-time" style="margin-left: 15px;"></span>
                    <?=date('Y-m-d H:i', strtotime($v['create_time']));?></p>

                <p>{{strlen($v['content']) > 600?(mb_substr($v['content'], 0, 200, 'utf-8') . '...'):$v['content']}}</p>
                <a class="btn btn-primary" href="/posts/{{$v['id']}}" target="_blank">查看详情
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>

                <hr></br>
            @endforeach
        @else
            <br/>
            <p class="lead">没有记录~</p><a href="/posts">返回</a>
        @endif
        <ul class="pager">
            <li ><!-- class="previous" -->
                <a href='/'></a>
            </li>
            <li style="margin-left: 20px;">共<font style="color:red"> 10 </font>页</li>
        </ul>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>文章搜索</h4>
            <form action="/zixun" onsubmit="" id="searchform">
                <div class="input-group">
                    <input type="text" class="form-control" id="title" value="" placeholder='输入你想搜索的关键词'>
                    <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" id="search">
                            <span class="glyphicon glyphicon-search"></span>
                        </input>
                    </span>
                </div>
            </form>

            <!-- /.input-group -->
        </div>

        <div class="well">
            <h4>热门文章</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <?php foreach ($hot_ask as $k => $v): ?>
                            <li style="width:400px;margin-top:10px;">
                                <a href="/zixun/<?=$v['id'];?>">
                                    <?php

if (strlen($v['title']) > 45) {
    echo mb_substr($v['title'], 0, 14, 'utf-8') . '...';
} else {
    echo $v['title'];
}
?>
                                    <span style="float:right;margin-right:68px;">
                                        <?=date('Y-m-d H:i', strtotime($v['create_time']));?>
                                    </span>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection