@extends("layout.main")

@section("content")
<style type="text/css">input{margin-bottom:15px;}</style>
<div class="container" style="max-width:350px;">
	<form class="form-signin" method="POST" action="/register">
		{{csrf_field()}}
		<h3 class="form-signin-heading">请注册
			<a style="float: right;font-size:16px;margin-top:7px;" href="/login">去登录</a>
		</h3>

		<label for="name" class="sr-only">名字</label>
		<input type="text" name="name" id="name" class="form-control" placeholder="名字" required autofocus>

		<label for="inputEmail" class="sr-only">邮箱</label>
		<input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>

		<label for="inputPassword" class="sr-only">密码</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>

		<label class="sr-only">重复密码</label>
		<input type="password" name="password_confirmation" class="form-control" placeholder="重复密码" required>

    	@include("layout.error")

		<button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
	</form>
</div>
<hr>
@endsection
