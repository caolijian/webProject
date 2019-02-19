@extends('common.layout')

@section('page_content')
    <div class="ui container">
        <div class="ui segments">
            <div class="ui segment">
                <div class="ui items">
                    @foreach($books as $book)
                    <div class="item">
                        <div class="ui small image">
                            <img src="{{$book->picture}}">
                        </div>
                        <div class="middle aligned content">
                            <div class="header">
                                {{$book->title}}
                            </div>
                            <div class="description">
                                {{$book->desc}}
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
                                <a class="ui right floated button" href="{{route('book.show',$book->id)}}">
                                    阅读全文
                                </a>
                                <a class="ui right floated blue button" href="{{route('book.edit',$book->id)}}">
                                    修改
                                </a>
                                <a class="ui right floated red button" href="{{route('book.destroy',$book->id)}}">
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
                <a class="icon item disabled" aria-disabled="true" aria-label="&laquo; 上一页"><i class="left chevron icon"></i></a>
                <a class="item active" href="#" aria-current="page">1</a>
                <a class="item" href="#">2</a>
                <a class="item" href="#">3</a>
                <a class="item" href="#">4</a>
                <a class="item" href="#">5</a>
                <a class="item" href="#">6</a>
                <a class="item" href="#">7</a>
                <a class="item" href="#">8</a>
                <a class="icon item disabled" aria-disabled="true">...</a>
                <a class="item" href="#">14</a>
                <a class="item" href="#">15</a>
                <a class="icon item" href="#" rel="next" aria-label="下一页 &raquo;"><i class="right chevron icon"></i></a>
            </div>
        </div>
    </div>

@endsection
