@extends('layouts.app')

@section('update')

    @include('common/errors')

    <form action="{{ action('PollController@update', ['id' => $poll->id]) }}" method="post">

        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
            {{--@if($errors->has('title'))--}}
            {{--THIS FIELD HAS ERRORS:--}}
            {{--@endif--}}
            {!! Form::label('name', 'Name of the pool', ['class' => 'control-label']) !!}
            {!! Form::text('name', $poll->name, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Text of the pool', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', $poll->description, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('choices', 'Number of options', ['class' => 'control-label']) !!}
            {!! Form::number('choices', $poll->choices, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

    </form>

@endsection