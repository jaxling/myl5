<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录页面
    public function Index()
    {
        return view('login/index');
    }

    //登录逻辑
    public function Login()
    {
        //验证
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer',
        ]);

        //逻辑
        $user = request(['email', 'password']);
        $is_remember = boolval(request('is_remember'));
        if (\Auth::attempt($user, $is_remember)) {
            return redirect('posts');
        }

        //渲染
        return \Redirect::back()->withErrors("用户名或密码错误");

    }

    //退出登录
    public function logout()
    {
        \Auth::logout();
        return redirect("login");
        //dd(\Request::all());
    }
}
