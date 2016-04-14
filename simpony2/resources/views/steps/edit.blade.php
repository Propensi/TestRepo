@extends('layouts.master')

@section('content')

    <h1>Edit Step</h1>
    <hr/>

    {!! Form::model($step, [
        'method' => 'PATCH',
        'url' => ['steps', $step->ID_Step],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('ID_Step') ? 'has-error' : ''}}">
                {!! Form::label('ID_Step', 'Id Step: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('ID_Step', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ID_Step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Assn_ID') ? 'has-error' : ''}}">
                {!! Form::label('Assn_ID', 'Assn Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Assn_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Assn_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Title') ? 'has-error' : ''}}">
                {!! Form::label('Title', 'Title: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Step') ? 'has-error' : ''}}">
                {!! Form::label('Step', 'Step: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Step', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection