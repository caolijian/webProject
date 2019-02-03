@extends('common.layout')

@section('page_style')
    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body > .grid {
            height: 100%;
        }

        .column {
            max-width: 450px;
        }
    </style>
@endsection

@section('page_content')
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <div class="content">
                    注册慕课书屋
                </div>
            </h2>
            <form class="ui large form {{$errors->any() ? 'error':''}}" method="post" action="{{route('register')}}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="name" placeholder="用户名" value="{{old('name')}}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail 地址" value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="密码">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password_confirmation" placeholder="确认密码">
                        </div>
                    </div>
                    <input type="submit" value="确认注册" class="ui fluid large teal submit button">
                    {{--<button type="submit" value="submit" class="ui fluid large teal submit button">--}}
                    {{--确认注册--}}
                    {{--</button>--}}
                </div>
                <div class="ui error message">
                    @if($errors->any())
                        <ul class="list">
                            @foreach($errors->all() as $errors_msg)
                                <li>{{$errors_msg}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </form>
            <div class="ui message">
                已经有账号啦？ <a href="{{route('login')}}">去登陆</a>
            </div>
        </div>
    </div>
    <!-- Following Menu -->
    <div class="ui large top fixed menu">
        <div class="ui container">
            <a class="item active" href="../index.html">主页</a>
            <a class="item" href="../book/index.html">书架</a>
            <a class="item" href="../article/index.html">文摘</a>
            <div class="right menu">
                <div class="item">
                    <a class="ui button" href="{{route('login')}}">登录</a>
                </div>
                <div class="item">
                    <a class="ui primary button" href="#">注册</a>
                </div>
            </div>
        </div>
    </div>
@endsection
