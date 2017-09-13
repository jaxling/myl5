@extends("layout.main")

@section("conent")
<h4><a href="/zixun">咨询列表</a></h4>
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <?php if (isset($detail)): ?>
            <h1 class="page-header">
                <?=$detail['title'];?>
                <!-- <small>副标题</small> -->
            </h1>

            <!-- First Blog Post -->
            <p class="lead"><?=$detail['nick_name'];?><span class="glyphicon glyphicon-time" style="margin-left: 15px;"></span>
                <?=date('Y-m-d H:i', strtotime($detail['create_time']));?></p>
            <!-- <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
            <hr>
            <p>
                <?=$detail['content'];?>
            </p>
            <hr>
            <?php if ($answer): ?>
                <p class="lead">心事回复(<?=count($answer);?>)</p>
                <?php foreach ($answer as $k => $v): ?>
                    <p><?=$v['expert_name'];?>(<?=$v['expert_title'];?>)  <?=$v['answer_time'];?></p>
                    <p style="margin-left: 45px;"><?=$v['content'];?></p><hr>
                <?php endforeach;?>
            <?php endif;?>
        <?php endif;?>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>咨询搜索</h4>
            <form action="/zixun" onsubmit="return checksearch()" id="searchform">
                <div class="input-group">
                    <input type="text" class="form-control" id="title" placeholder='输入你想搜索的关键词'>
                    <span class="input-group-btn">
                        <input class="btn btn-default" type="submit" id="search">
                            <span class="glyphicon glyphicon-search"></span>
                        </input>
                    </span>
                </div>
            </form>
            <!-- /.input-group -->
        </div>

        <?php if (isset($hot_ask)): ?>
            <div class="well">
                <h4>热门咨询</h4>
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
        <?php endif;?>
    </div>
</div>
@endsection