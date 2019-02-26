@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
    <link rel="stylesheet" href="/css/wangEditor.min.css">
@endsection

@section('page_content')
    <div class="ui container">
        <h2 class="ui dividing header">添加新的图书</h2>
        <form class="ui form {{ $errors->any() ? 'error' : '' }}" method="POST"
              action="{{ route('book.update',$book->id) }}"
              enctype="multipart/form-data">
            <div class="ui grid">
                <div class="four wide computer column">
                    <input src="{{$book->picture}}" type="file" name="picture" class="dropify"
                           data-default-file="{{$book->picture}}"
                           data-allowed-file-extensions="jpg png jpeg"/>
                </div>
                <div class="twelve wide computer column">
                    @csrf
                    @include('common.formMessage')
                    {{method_field('PUT')}}
                    <div class="two fields">
                        <div class="field">
                            <label>图书名称</label>
                            <input type="text" name="title" value="{{$book->title}}" placeholder="请输入图书名称">
                        </div>
                        <div class="field">
                            <label>作者名称</label>
                            <input type="text" name="author" value="{{ $book->author }}" placeholder="请输入作者姓名">
                        </div>
                    </div>
                    <div class="field">
                        <label>图书简介</label>
                        <textarea rows="4" name="desc">{{$book->desc}}</textarea>
                    </div>
                    <div class="field">
                        <div id="editor">
                            <p>{!! $book->content !!}</p>
                        </div>
                    </div>
                    <button class="ui green button" type="submit" value="submit">确认修改</button>
                    <a class="ui red button" href="javascript:history.back()">返回</a>
                    <textarea name="content" id="content" style="display: none"></textarea>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('page_script')
    <script src="/js/dropify.min.js"></script>
    <script src="/js/wangEditor.min.js"></script>
    <script>
        $(function () {
            $('.dropify').dropify({
                messages: {
                    'default': '在这里上传图书封面',
                    'replace': '在这里替换新的图书封面',
                    'remove': '删除',
                    'error': '哦噢，出错啦'
                }
            });
            var E = window.wangEditor;
            var editor = new E('#editor');
            var $content = $('#content');
            editor.customConfig.onchange = function (html) {
                // 监控变化，同步更新到 textarea
                $content.val(html);
            };
            editor.customConfig.zIndex = 2;
            editor.create();
            $content.val(editor.txt.html())
        })
    </script>
@endsection

