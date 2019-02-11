@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
    <link rel="stylesheet" href="/css/wangEditor.min.css">
@endsection

@section('page_content')
    <div class="ui container">
        <h2 class="ui dividing header">添加新的图书</h2>
        <div class="ui grid">
            <div class="four wide computer column">
                <input type="file" class="dropify" data-default-file="" data-allowed-file-extensions="pdf png psd" />
            </div>
            <div class="twelve wide computer column">
                <form class="ui form {{$errors->all() ? 'error' : ''}} " action="{{route('book.create')}}">
                    @csrf
                    <div class="two fields">
                        <div class="field">
                            <label>图书名称</label>
                            <input type="text" placeholder="请输入图书名称">
                        </div>
                        <div class="field">
                            <label>作者名称</label>
                            <input type="text" placeholder="请输入作者姓名">
                        </div>
                    </div>
                    <div class="field">
                        <label>图书简介</label>
                        <textarea rows="4"></textarea>
                    </div>
                    <div class="field">
                        <div id="editor">
                            <p>在这里输入图书主要内容</p>
                        </div>
                    </div>
                    <button class="ui green button" type="submit">确认发布</button>
                    <a class="ui red button" href="index.html">返回书架</a>
                    @include('common.formMessage')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page_script')
    <script src="/js/dropify.min.js"></script>
    <script src="/js/wangEditor.min.js"></script>
    <script>
        $(function() {
            $('.dropify').dropify({
                messages: {
                    'default': '在这里上传图书封面',
                    'replace': '在这里替换新的图书封面',
                    'remove':  '删除',
                    'error':   '哦噢，出错啦'
                }
            });
            var E = window.wangEditor
            var editor2 = new E('#editor')
            editor2.create();
        })
    </script>
@endsection
