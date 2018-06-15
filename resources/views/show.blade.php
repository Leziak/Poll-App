@extends("layouts/app")
@section("show")

<h1>{{$poll->name}}</h1>
<p>{{$poll->description}}</p>

@foreach($options as $key => $option)

{{$key + 1}} : {{$option->option}}
@if($option->type)
 {!!Form::checkbox("option", "{$option->id}")!!}
 @else {!!Form::radio("option", "{$option->id}")!!}
 @endif
<br>


@endforeach




@endsection;