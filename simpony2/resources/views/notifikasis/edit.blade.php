@extends('layouts.master')

@section('content')

    <h1>Edit Notifikasi</h1>
    <hr/>

    {!! Form::model($notifikasi, [
        'method' => 'PATCH',
        'url' => ['notifikasis', $notifikasi->Notif_ID],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('Notif_ID') ? 'has-error' : ''}}">
                {!! Form::label('Notif_ID', 'Notif Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Notif_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Notif_ID', '<p class="help-block">:message</p>') !!}
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
<!--            <div class="form-group {{ $errors->has('Time') ? 'has-error' : ''}}">
                {!! Form::label('Time', 'Time: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('Time', 'Time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>-->
            <div class="form-group {{ $errors->has('Sender') ? 'has-error' : ''}}">
                {!! Form::label('Sender', 'Sender: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Sender', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Sender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Receiver') ? 'has-error' : ''}}">
                {!! Form::label('Receiver', 'Receiver: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Receiver', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Receiver', '<p class="help-block">:message</p>') !!}
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