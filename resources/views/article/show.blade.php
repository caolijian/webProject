@extends('common.layout')

@section('page_style')
    <style>
        .ui.comments .comment .avatar img, .ui.comments .comment img.avatar {
            height: inherit;
        }
    </style>
@endsection

@section('page_content')
<div class="ui container">
    <div class="ui grid">
        <div class="eleven wide computer column">
            <div class="ui text container" style="max-width:100% !important">
                <h2 class="ui header">{{$article->title}}</h2>
                {!! $article->content !!}
            </div>
            <h2 class="ui dividing header">相关评论</h2>
            <div class="ui comments">
                <div class="comment">
                    <a class="avatar">
                        <img src="/images/avatar_1.jpg">
                    </a>
                    <div class="content">
                        <a class="author">张三</a>
                        <div class="metadata">
                            <div class="date">
                                1 天以前
                            </div>
                        </div>
                        <div class="text">
                            写的真好！给你一百个赞！！
                        </div>
                        <div class="actions">
                            <a class="reply">Reply</a>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <a class="avatar">
                        <img src="/images/avatar_2.jpg">
                    </a>
                    <div class="content">
                        <a class="author">赵柳</a>
                        <div class="metadata">
                            <div class="date">
                                2 天前
                            </div>
                        </div>
                        <div class="text">
                            同意楼上说法
                        </div>
                        <div class="actions">
                            <a class="reply">回复</a>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <a class="avatar">
                        <img src="/images/avatar_3.jpg">
                    </a>
                    <div class="content">
                        <a class="author">王五</a>
                        <div class="metadata">
                            <div class="date">
                                2 天前
                            </div>
                        </div>
                        <div class="text">
                            同意二楼说法
                        </div>
                        <div class="actions">
                            <a class="reply">回复</a>
                        </div>
                    </div>
                </div>
                <div class="comment">
                    <a class="avatar">
                        <img src="/images/avatar_4.jpg">
                    </a>
                    <div class="content">
                        <a class="author">李四</a> 回复 <a class="author">张三</a>
                        <div class="metadata">
                            <div class="date">
                                4 天前
                            </div>
                        </div>
                        <div class="text">
                            哈哈哈哈
                        </div>
                        <div class="actions">
                            <a class="reply">回复</a>
                        </div>
                    </div>
                </div>
                <form class="ui reply form">
                    <div class="field">
                        <textarea></textarea>
                    </div>
                    <div class="ui primary submit labeled icon button">
                        <i class="icon edit"></i> 添加评论
                    </div>
                </form>
            </div>
        </div>
        <div class="five wide computer column">
            <h3 class="ui header">最热推荐</h3>
            <div class="ui divided items">
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_1.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章1</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_2.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章2</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_3.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章3</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_4.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章4</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_5.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章5</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui tiny image">
                        <img src="/images/article_6.jpeg">
                    </div>
                    <div class="middle aligned content">
                        <a class="header">文章6</a>
                        <div class="meta">
                            <span class="author">来自<a>作者</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('page_script')
    <script>
        $('.reply-button').on('click', function () {
            $('#reply_user_id').val($(this).data('author'));
            $('#content').focus();
        })
    </script>
@endsection
