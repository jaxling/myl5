@extends("layout.main")

@section("content")
<style type="text/css">input{margin-bottom:15px;}</style>
<div class="container" style="max-width:350px;">
	<form class="form-signin" method="POST" action="/login">
		{{csrf_field()}}
		<h3 class="form-signin-heading">请登录</h3>

		<label for="inputEmail" class="sr-only">邮箱</label>
		<input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>

		<label for="inputPassword" class="sr-only">密码</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>

		<div class="checkbox">
			<label>
				<input type="checkbox" name="is_remember" value="1"> 记住我
			</label>
			<a style="float:right;margin-right:10px;" href="/register">去注册</a>
		</div>

    	@include("layout.error")

		<button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
	</form>
</div>
<hr>
@endsection
