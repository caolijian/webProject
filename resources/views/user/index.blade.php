@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
@endsection

@section('page_content')
    <div class="ui container">
        <div class="ui grid">
            <div class="four wide column">
                <div class="ui vertical fluid right tabular menu">
                    <a class="item active" href="index.html">个人信息 </a>
                    <a class="item " href="noti.html">消息中心
                        <div class="ui red circular label">
                            12
                        </div>
                    </a>
                    <a class="item " href="password.html">密码修改 </a>
                </div>
            </div>
            <div class="twelve wide stretched column">
                <form class="ui form" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                    {{--模拟put请求--}}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="three fields">
                        <div class="field">
                            <input type="file" name="avatar" class="dropify" data-default-file=""
                                   data-allowed-file-extensions="pdf png psd"/>
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>用户名</label>
                            <input type="text" name="name" value="" placeholder="请输入图书名称">
                        </div>
                    </div>
                    <div class="field">
                        <label>个人简介</label>
                        <textarea rows="4" name="description"></textarea>
                    </div>
                    <button class="ui green button" type="submit">确认修改</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('page_script')
    <script src="/js/dropify.min.js"></script>
    <script>
        $('.dropdown').dropdown();
        $('.dropify').dropify({
            messages: {
                'default': '在这里上传您的头像',
                'replace': '在这里替换新的头像',
                'remove': '删除',
                'error': '哦噢，出错啦'
            }
        });
    </script>
@endsection
