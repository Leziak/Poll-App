@extends('layouts.app')

@section('create')

    @include('common/errors')
<form action="{{ action('PollController@store') }}" method="post">

        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('title') ? 'is-invalid' : '' }}">
            {{--@if($errors->has('title'))--}}
                {{--THIS FIELD HAS ERRORS:--}}
            {{--@endif--}}
            {!! Form::label('name', 'Name of the poll', ['class' => 'control-label']) !!}
            {!! Form::text('name', null,  ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::label('text', 'Text of the poll', ['class' => 'control-label']) !!}
            {!! Form::textarea('text', null, ['class' => 'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('choices', 'Number of options', ['class' => 'control-label']) !!}
            {!! Form::number('choices', null, ['onchange'=>"generateInputs()", 'class' => 'form-control']) !!}
        </div>

    {{--{!! Form::text('barcode', null,['onchange'=>"showProduct(this.value);"]) !!}--}}


        <div class="form-group">
            Radio: {!! Form::radio("type", "radio") !!}<br>
            Checkbox: {!! Form::radio("type", "checkbox") !!}
        </div>

        <div class="form-group" id="names">

        </div>

        <div class="form-group">
            {!! Form::submit('Save') !!}
        </div>

    </form>

@endsection

@section('scripts')
    <script>
        document.querySelector('#choices').onchange = function(){
            alert();
        };
        generateInputs = () => {
            let num = Number(document.querySelector('#choices').value);
            document.querySelector('#names').innerHTML=''
            for(let i = 1;i <= num;i++) {
                document
                    .querySelector('#names')
                    .innerHTML+=
                `<input name='option${i}' type='text'><br>`

            }

        }
    </script>
@stop