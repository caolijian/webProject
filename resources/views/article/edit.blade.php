@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
    <link rel="stylesheet" href="/css/wangEditor.min.css">
    <link rel="stylesheet" href="/js/components/dropdown.min.css">
@endsection

@section('page_content')
    <div class="ui container">
        <h2 class="ui dividing header">添加新的文摘</h2>
        <form class="ui form {{ $errors->any() ? 'error' : '' }}" method="POST"
              action="{{ route('article.update',$article->id) }}"
              enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <div class="ui grid">
                <div class="four wide computer column">
                    <input type="file" class="dropify" name="cover" data-default-file="{{$article->cover}}" data-allowed-file-extensions="jpg png jpeg"/>
                </div>
                <div class="twelve wide computer column">
                    @include('common.formMessage')
                    <div class="two fields">
                        <div class="field">
                            <label>文摘名称</label>
                            <input type="text" name="title" value="{{$article->title}}" placeholder="请输入图书名称">
                        </div>
                        <div class="field">
                            <label>文摘标签</label>
                            <select name="tags" class="ui selection dropdown" multiple="" id="multi-select">
                                <option id="1" value="AL">恐怖</option>
                                <option id="2" value="AK">悬疑</option>
                                <option id="3" value="AZ">科幻</option>
                                <option id="4" value="AR">纪实</option>
                                <option id="5" value="CA">修真</option>
                                <option id="6" value="OH">推理</option>
                                <option id="7" value="OK">军事</option>
                                <option id="8" value="OR">探险</option>
                                <option id="9" value="PA">游戏</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label>文摘简介</label>
                        <textarea rows="4" name="desc">{{$article->desc}}</textarea>
                    </div>
                    <div class="field">
                        <div id="editor">
                            {!! $article->content !!}
                        </div>
                    </div>
                    <textarea name="content" id="content" style="display: none"></textarea>
                    {{--<input type="hidden" name="book_id" value="{{$book_id}}">--}}
                    <button class="ui green button" type="submit">确认修改</button>
                    <a class="ui red button" href="{{route('article.index')}}">返回文摘</a>

                </div>
            </div>
        </form>
    </div>
@endsection

@section('page_script')
    <script src="/js/components/dropdown.js"></script>
    <script src="/js/dropify.min.js"></script>
    <script src="/js/wangEditor.min.js"></script>
    <script>
        $(function () {
            $('#multi-select').dropdown({
                maxSelections: 3,
                placeholder: '选择合适的标签'
            });
            $('.dropify').dropify({
                messages: {
                    'default': '在这里上传文摘封面',
                    'replace': '在这里替换新的文摘封面',
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

