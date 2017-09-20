@extends("layout.main")

@section("content")
<div class="col-sm-8 blog-main">
	<form class="form-horizontal" action='/usesr/5/setting' method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label class="col-sm-2 control-label">用户名</label>
			<div class="col-sm-10">
				<input class="from-control" type="text" name="name" value="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">头像</label>
			<div class="col-sm-2">
				<input class="file-loading preview_input" type="file" name="avatar" value="用户名" style="width: 72px">
				<img src="image/user.jpg" class="img-rounded preview_img" style="border-radius: 500px">
			</div>
		</div>
		<button type="submit" class="btn btn-default">修改</button>
	</form>
	<br>
</div>
@endsection
