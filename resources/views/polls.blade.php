@extends('layouts.app')


@section('polls')

    @foreach($polls as $poll)

        <h1><a href="{{action("PollController@show", ["id" => $poll->id])}}">{{$poll->name}}</a></h1>
        <p>{{$poll->description}}</p>
________________________________________________________________________________


    @endforeach
    {{ $polls->render() }}
@endsection

