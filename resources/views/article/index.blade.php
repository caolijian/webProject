@extends('common.layout')

@section('page_content')
    <div class="ui container">
        <div class="ui segments">
            <div class="ui segment">
                <div class="ui items">
                    @foreach($articles as $article)
                    <div class="item">
                        <div class="ui small image">
                            <img src="{{$article->cover}}">
                        </div>
                        <div class="middle aligned content">
                            <div class="header">
                                {{$article->title}}
                            </div>
                            <div class="description">
                                {{$article->desc}}
                            </div>
                            <div class="extra">
                                <div class="ui label">
                                    <i class="globe icon"></i> 科幻
                                </div>
                                <div class="ui label">
                                    <i class="globe icon"></i> 言情
                                </div>
                                <div class="ui label">
                                    <i class="globe icon"></i> 盗墓
                                </div>
                                <a class="ui right floated button" href="{{route('article.show',$article->id)}}">
                                    阅读全文
                                </a>
                                <a class="ui right floated blue button" href="{{route('article.edit',$article->id)}}">
                                    修改
                                </a>
                                <a class="ui right floated red button" href="{{route('article.destroy',$article->id)}}">
                                    删除
                                </a>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="ui center aligned container" style="margin:4em">
            <div class="ui pagination menu" role="navigation">
                {{$articles->links('vendor.pagination.semantic-ui')}}
            </div>
        </div>
    </div>

@endsection
