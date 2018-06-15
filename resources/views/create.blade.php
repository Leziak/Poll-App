@extends('layouts.app')

@section('create')

    @include('common/errors')
<form action="{{ action('PollController@store') }}" method="post">

        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
            {{--@if($errors->has('title'))--}}
                {{--THIS FIELD HAS ERRORS:--}}
            {{--@endif--}}
            {!! Form::label('name', 'Name of the pool', ['class' => 'control-label']) !!}
            {!! Form::text('name', null,  ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Text of the pool', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('choices', 'Number of options', ['class' => 'control-label']) !!}
            {!! Form::number('choices', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::radio("type", "radio") !!}
            {!! Form::radio("type", "checkbox") !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

    </form>

@endsection