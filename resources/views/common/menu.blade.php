<div class="ui large top {{Request::path()=='/' ? 'fixed' : ''}} menu">
    <div class="ui container">
        <a class="item active" href="/">主页</a>
        <a class="item" href="book/index.html">书架</a>
        <a class="item" href="article/index.html">文摘</a>
        <div class="right menu">
            <div class="item">
                <div class="ui action input">
                    <input type="text" name="keyword" placeholder="输入关键词...">
                    <div class="ui compact selection dropdown" tabindex="0"><select name="type">
                            <option selected="" value="1">图书</option>
                            <option value="2">文摘</option>
                        </select><i class="dropdown icon"></i>
                        <div class="text">图书</div>
                        <div class="menu" tabindex="-1">
                            <div class="item active selected" data-value="1">图书</div>
                            <div class="item" data-value="2">文摘</div>
                        </div>
                    </div>
                    <button type="submit" class="ui button">搜索</button>
                </div>
            </div>

            @auth
                <div class="ui right dropdown item">
                    admin
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item active" href="{{ route('user.index') }}">个人中心</a>
                        <a class="item " href="#">后台管理</a>
                        <div class="item" onclick="$('#logout_form').submit()">
                            退出登录
                        </div>
                        {{--隐藏form模拟注销的post请求--}}
                        <form style="display: none" action="{{ route('logout') }}" method="POST" id="logout_form">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <div class="item">
                    <a class="ui button" href="{{ route('login') }}">登录</a>
                </div>
                <div class="item">
                    <a class="ui primary button" href="{{ route('register') }}">注册</a>
                </div>
            @endauth

        </div>
    </div>
</div>
