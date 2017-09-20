<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户中心
    public function Index()
    {
        return view('user/index');
    }

    //用户设置
    public function Setting()
    {
        return view('user/setting');
    }

    function as () {

        dd(Request::all());
    }
}
