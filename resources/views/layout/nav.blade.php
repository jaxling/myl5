<ul class="nav navbar-nav">
    <li>
        <a href="/posts" title="Posts">Posts</a>
    </li>
    <li>
        <a href="/app">About</a>
    </li>
    @if (Auth::check())
    	<li class="dropdown">
            <div>
                <img src="http://test.myl5.com/storage/b85493e61be9c81384addd2389f1ee51/B1a9g411Bgl7p1Cz9LSF2QnIp7bicgb6ZfhsvZkw.jpeg" class="img-rounded" style="border-radius:50%;width:30px;">
                <a href="#" class="blog-nav-item dropdown-toggle" data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false' style="margin-left:3px;color:#9d9d9d;text-align:center;line-height:50px;text-decoration:none;">{{ \Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="/user">我的主页</a></li>
                    <li><a href="/user/setting">个人设置</a></li>
                    <li><a href="/logout">退出登录</a></li>
                </ul>
            </div>
        </li>
    @else
    	<li class="mineee"><a href="{{ url('/login') }}">Login</a></li>
    	<li class="mineee"><a href="{{ url('/register') }}">Register</a></li>
    @endif
</ul>
