@extends("layouts/app")
@section("show")

    <h1>{{$poll->name}}</h1>
    <p>{{$poll->description}}</p>


    @foreach($options as $option)

        <h1>{{$option->option}}: {{$option->count}}</h1>

    @endforeach



    <form action="{{ action('PollController@vote') }}" method="post">

        {{ csrf_field() }}

        @foreach($options as $key => $option)

            {{$key + 1}} : {{$option->option}}
            @if($option->type)
                {!!Form::checkbox("option[]", "{$option->id}")!!}
            @else
                {!!Form::radio("option[]", "{$option->id}")!!}
            @endif
            <br>


        @endforeach

        <div class="form-group">
            {!! Form::submit('Vote') !!}
        </div>
    </form>




@endsection;