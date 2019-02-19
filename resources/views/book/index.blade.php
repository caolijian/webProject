@extends('common.layout')

@section('page_content')
    <div class="pusher">
        <div class="ui container">
            <div class="ui segments">
                <div class="ui segment">
                    <div class="ui four link cards">
                        @foreach($books as $book)
                            <div class="card">
                                <div class="image">
                                    <img src="{{$book->picture}}">
                                </div>
                                <div class="content">
                                    <div class="header">
                                        <a href="{{ route('book.show',$book->id) }}">{{$book->title}}</a>
                                    </div>
                                    <div class="meta">
                                        {{$book->author}}
                                    </div>
                                    <div class="description">
                                        {{$book->desc}}
                                    </div>
                                </div>
                                <div class="extra content">
                                    <span class="right floated">{{$book->created_at}}</span>
                                    <span><i class="user icon"></i> 2 篇文摘 </span>
                                </div>
                                <div class="extra content">
                                    <a href="{{route('article.create',['book_id' => $book->id])}}" class="ui basic fluid green button">写文摘</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ui center aligned container" style="margin:4em">
                {{$books->links('vendor.pagination.semantic-ui')}}
            </div>
        </div>
    </div>
@endsection




