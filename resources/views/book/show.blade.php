@extends('common.layout')

@section('page_content')
    <div class="ui container">
        <h2 class="ui header">
            <img src="{{ $book->picture }}" class="ui circular image">
            《{{ $book->title }}》
            <div class="sub header">{{ $book->desc }}</div>
        </h2>
        <div class="ui piled segment">
            {!! $book->content !!}
        </div>
        <h2 class="ui dividing header">相关文摘</h2>
        <div class="ui segment">
            <a href="">文摘</a>
        </div>
        <div class="ui segment">
            这本图书下面还没有任何文摘 快去 <a href="#">写一篇</a> 吧
        </div>
    </div>
@endsection
