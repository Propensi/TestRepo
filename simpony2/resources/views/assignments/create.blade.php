@extends('layouts.admin_template')

@section('content')
    <h1>Create Request Form </h1>
    <hr/>
    {!! Form::open(['url' => 'assignments', 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('Assn_Nama') ? 'has-error' : ''}}">
                {!! Form::label('Assn_Nama', 'Judul :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Assn_Nama', null, ['class' => 'form-control', 'required'=> 'required']) !!}
                    {!! $errors->first('Assn_Nama', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Assn_Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Assn_Deskripsi', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Assn_Deskripsi', null, ['class' => 'form-control', 'required'=> 'required']) !!}
                    {!! $errors->first('Assn_Deskripsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('Tgl_Deadline') ? 'has-error' : ''}}">
                {!! Form::label('Tgl_Deadline', 'Deadline: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Tgl_Deadline', null, ['class' => 'form-control', 'required'=> 'required']) !!}

                    
                    {!! $errors->first('Tgl_Deadline', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
          
            {!! Form::hidden('HOD_ID', '19' ) !!}
            {!! Form::hidden('Dept_ID','3') !!}
            {!! Form::hidden('Emp_ID_Req_Vald', Auth::user()->user_ID ) !!}
                <div class="form-group {{ $errors->has('Assn_File') ? 'has-error' : ''}}">
                {!! Form::label('Assn_File', 'File: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::file('file') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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