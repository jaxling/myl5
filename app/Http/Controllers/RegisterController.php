<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //注册页面
    public function Index()
    {
        return view('register/index');
    }

    //注册逻辑
    public function Register()
    {
        //验证
        $this->validate(request(), [
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:10|confirmed',
        ]);

        //逻辑
        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $user = User::create(compact('name', 'email', 'password'));

        //渲染
        return redirect('/login');
    }

    public function Test()
    {

        dd(\Request::all());
    }
}
