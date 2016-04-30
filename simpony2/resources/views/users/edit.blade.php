@extends('layouts.admin_template')

@section('content')

    <h1>Edit User</h1>
    <hr/>

    {!! Form::model($user, [ 
        'method' => 'PATCH',
        'url' => ['users', $user->user_ID],
        'class' => 'form-horizontal',
        'class' => 'form-horizontal update'
    ]) !!}

                <!--<div class="form-group {{ $errors->has('User_ID') ? 'has-error' : ''}}">
                {!! Form::label('user_ID', 'User Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('user_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>-->
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
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

            <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
                {!! Form::label('role', 'Role: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('role', (['' => 'Select a Role'] + array('Head of Dept' => 'Head of Dept','Head Group' => 'Head Group','Staff'=> 'Staff')), null,['class' => 'form-control' , 'required'=> 'required']); !!}

                    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('Dept_name') ? 'has-error' : ''}}">
                {!! Form::label('Dept_name', 'Dept Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    
                    {!! Form::select('Dept_name', (['' => 'Select a Department'] + $departments), null,['class' => 'form-control' , 'required'=> 'required']); !!}
                    {!! $errors->first('Dept_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

<!--             <div class="form-group {{ $errors->has('Mgr_ID') ? 'has-error' : ''}}">
                {!! Form::label('Mgr_ID', 'Mgr Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                    {!! Form::select('mgr_id', (['' => 'Select a Manager'] + $users), null, ['class' => 'form-control' , 'required'=> 'required']) !!}
                    {!! $errors->first('Mgr_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->


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

<script>
    $(".update").on("submit", function(){
        return confirm("Do you want to update this item?");
    });
</script>


@endsection