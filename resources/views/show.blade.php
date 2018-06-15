@extends("layouts/app")
@section("show")

    <h1>{{$poll->name}}</h1>
    <p>{{$poll->description}}</p>

    @if(!$show_form)


    @foreach($options as $option)

        <h1>{{$option->option}}: {{$option->count}}</h1>

    @endforeach

    @endif



    @if($show_form)

    <form action="{{ action('PollController@vote', ['id' => $poll->id]) }}" method="post">

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

    @else
        <h1>You already voted!</h1>
    @endif




@endsection;