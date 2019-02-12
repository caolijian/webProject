
@if(session('success'))
    <div class="ui positive message">
        <i class="close icon"></i>
        {{session('success')}}
    </div>
@endif

<div class="ui error message">
    @if($errors->any())
        <ul class="list">
            @foreach($errors->all() as $errors_msg)
                <li>{{$errors_msg}}</li>
            @endforeach
        </ul>
    @endif
</div>
