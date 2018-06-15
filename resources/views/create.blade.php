@extends('layouts.app')

@section('create')

    @include('common/errors')

    <form action="{{ action('PollController@store' }}" method="post">

        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
            {{--@if($errors->has('title'))--}}
                {{--THIS FIELD HAS ERRORS:--}}
            {{--@endif--}}
            {!! Form::label('name', 'Name of the pool', ['class' => 'control-label']) !!}
            {!! Form::text('name', null,  ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Text of the pool', ['class' => 'control-label']) !!}
            {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Number of options', ['class' => 'control-label']) !!}
            {!! Form::number('text', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

    </form>

@endsection