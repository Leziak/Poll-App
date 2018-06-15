@extends('layouts.app')


@section('polls')

    @foreach($polls as $poll)

        <h1>{{$poll->name}}</h1>
        <h1>{{$poll->description}}</h1>

    @endforeach

@endsection

