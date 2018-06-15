@extends('layouts.app')


@section('polls')

    @foreach($polls as $poll)

        <h1><a href="/polls/{{$poll->id}}">{{$poll->name}}</a></h1>
        <h1>{{$poll->description}}</h1>

    @endforeach

@endsection

