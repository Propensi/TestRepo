@extends('layouts.admin_template')

@section('content')

    <h1>Create New User</h1>
    <hr/>

    {!! Form::open(['url' => 'users', 'class' => 'form-horizontal']) !!} 

                <!--<div class="form-group {{ $errors->has('User_ID') ? 'has-error' : ''}}">
                {!! Form::label('User_ID', 'User Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('User_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('User_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>-->
            <div class="form-group {{ $errors->has('Name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('no_peg') ? 'has-error' : ''}}">
                {!! Form::label('no_peg', 'No Peg: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('no_peg', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('no_peg', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password', 'Password: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                {!! Form::label('role', 'Role: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                {!! Form::select('role', (['User' => 'Select a Role'] + array('Head of Dept' => 'Head of Dept','Head Group' => 'Head Group','Staff'=> 'Staff','User'=> 'User')), 'User',['class' => 'form-control' , 'required'=> 'required']); !!}

                    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('Dept_name') ? 'has-error' : ''}}">
                {!! Form::label('Dept_name', 'Dept Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('Dept_name', (['' => 'Select Department'] + $departments), null, ['class' => 'form-control' , 'required'=> 'required']) !!}                
                     {!! $errors->first('Dept_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!-- <div class="form-group {{ $errors->has('Mgr_ID') ? 'has-error' : ''}}">
                {!! Form::label('Mgr_ID', 'Mgr Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                     {!! Form::select('mgr_id', (['' => 'Select a Manager'] + $users), null, ['class' => 'form-control' , 'required'=> 'required']) !!}                    {!! $errors->first('Mgr_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->









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