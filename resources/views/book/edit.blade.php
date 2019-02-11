@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
    <link rel="stylesheet" href="/css/wangEditor.min.css">
@endsection

@section('page_content')
    <div class="ui container">
        <h2 class="ui dividing header">正在编辑《图书名称》</h2>
        <div class="ui grid">
            <div class="four wide computer column">
                <input type="file" class="dropify" data-default-file="/images/book_1.jpg"
                       data-allowed-file-extensions="pdf png psd"/>
            </div>
            <div class="twelve wide computer column">
                <form class="ui form {{$error->all() ? 'error' : ''}} " method="PUT" action="{{route('book.update')}}">
                    @csrf
                    {{method_field('PUT')}}
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
                            <p>这里是图书 <b>主要内容</b> 编辑区域</p>
                        </div>
                    </div>
                    <button class="ui green button" value="submit" type="submit">确认修改</button>
                    <a class="ui red button" href="index.html">返回书架</a>
                </form>
            </div>
        </div>
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
            var E = window.wangEditor
            var editor2 = new E('#editor')
            editor2.create();
        })
    </script>
@endsection
