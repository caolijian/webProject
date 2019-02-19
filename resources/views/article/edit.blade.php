@extends('common.layout')

@section('page_style')
    <link rel="stylesheet" href="/css/dropify.min.css">
    <link rel="stylesheet" href="/css/wangEditor.min.css">
@endsection

@section('page_content')
<div class="ui container">
    <h2 class="ui dividing header">修改文摘 《文摘标题》</h2>
    <div class="ui grid">
        <div class="four wide computer column">
            <input type="file" class="dropify" data-default-file="../resources/images/article_1.png" data-allowed-file-extensions="pdf png psd" />
        </div>
        <div class="twelve wide computer column">
            <form class="ui form">
                <div class="two fields">
                    <div class="field">
                        <label>文摘名称</label>
                        <input type="text" placeholder="请输入图书名称" value="文摘标题">
                    </div>
                    <div class="field">
                        <label>文摘标签</label>
                        <select name="tags" class="ui selection dropdown" multiple="" id="multi-select">
                            <option id="1" value="AL" selected>恐怖</option>
                            <option id="2" value="AK" selected>悬疑</option>
                            <option id="3" value="AZ" selected>科幻</option>
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
                    <textarea rows="4">这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述这里文摘简述
                            </textarea>
                </div>
                <div class="field">
                    <div id="editor">
                        <p>在这里输入文摘内容</p>
                    </div>
                </div>
                <button class="ui green button" type="submit">确认修改</button>
                <a class="ui red button" href="index.html">返回文摘</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page_script')

<script src="/js/components/dropdown.js"></script>
<script src="/js/dropify.min.js"></script>
<script src="/js/wangEditor.min.js"></script>
<script>
    $(function() {
        $('#multi-select').dropdown({
            maxSelections: 3,
            placeholder: '选择合适的标签'
        });
        $('.dropify').dropify({
            messages: {
                'default': '在这里上传文摘封面',
                'replace': '在这里替换新的文摘封面',
                'remove':  '删除',
                'error':   '哦噢，出错啦'
            }
        });
        var E = window.wangEditor
        var editor = new E('#editor')
        editor.customConfig.zIndex = 2
        editor.create();
    })
</script>
@endsection
