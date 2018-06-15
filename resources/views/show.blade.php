@extends("layouts/app")
@section("show")

<h1>{{$poll->name}}</h1>
<p>{{$poll->description}}</p>

{{$poll->choices}}


@endsection;