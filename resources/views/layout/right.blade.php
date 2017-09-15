
<div class="col-md-4">
    @if(request()->route()->uri() != 'posts/create')
        <h4><a class="btn btn-primary" href="/posts/create" ><i class="iconfont">&#xe6c4;</i>&nbsp;写文章</a></h4>
    @endif
    <br/>
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

    @if(isset($hot_ask) && $hot_ask)
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
    @endif

</div>