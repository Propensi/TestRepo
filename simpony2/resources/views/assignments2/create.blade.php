@extends('layouts.admin_template')

@section('content')
<div class="col-md-12">
<div class="box">
<!-- WKWK -->
            <div class="box-header with-border">
              <h3 class="box-title">Create Request Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                 {!! Form::open(['url' => 'assignments', 'class' => 'form-horizontal' , 'files' => true ]) !!}

                <!-- <div class="form-group {{ $errors->has('Assn_ID') ? 'has-error' : ''}}">
                {!! Form::label('Assn_ID', 'Assn Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Assn_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Assn_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
<!--             <div class="form-group {{ $errors->has('Staff_Prog_ID_Do') ? 'has-error' : ''}}">
                {!! Form::label('Staff_Prog_ID_Do', 'Staff Prog Id Do: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Staff_Prog_ID_Do', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Staff_Prog_ID_Do', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
<!--             <div class="form-group {{ $errors->has('Emp_ID_Req_Vald') ? 'has-error' : ''}}">
                {!! Form::label('Emp_ID_Req_Vald', 'Emp Id Req Vald: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Emp_ID_Req_Vald', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Emp_ID_Req_Vald', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
            <div class="form-group {{ $errors->has('Assn_Nama') ? 'has-error' : ''}}">
                {!! Form::label('Assn_Nama', 'Judul :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('Assn_Nama', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Assn_Nama', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Assn_Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Assn_Deskripsi', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::textarea('Assn_Deskripsi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Assn_Deskripsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
<!--             <div class="form-group {{ $errors->has('Assn_File') ? 'has-error' : ''}}">
                {!! Form::label('Assn_File', 'Assn File: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Assn_File', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Assn_File', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
<!--             <div class="form-group {{ $errors->has('Assn_Status') ? 'has-error' : ''}}">
                {!! Form::label('Assn_Status', 'Assn Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                <div class="checkbox">
                <label>{!! Form::radio('Assn_Status', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('Assn_Status', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('Assn_Status', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
<!--             <div class="form-group {{ $errors->has('Tgl_Request') ? 'has-error' : ''}}">
                {!! Form::label('Tgl_Request', 'Tgl Request: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Tgl_Request', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Tgl_Request', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
            <div class="form-group {{ $errors->has('Tgl_Deadline') ? 'has-error' : ''}}">
                {!! Form::label('Tgl_Deadline', 'Deadline: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::date('Tgl_Deadline', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Tgl_Deadline', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('Assn_File') ? 'has-error' : ''}}">
                {!! Form::label('Assn_File', 'File: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                {!! Form::file('file') !!}
                </div>
            </div>
           <!--  <div class="form-group {{ $errors->has('Milestone') ? 'has-error' : ''}}">
                {!! Form::label('Milestone', 'Milestone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Milestone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Milestone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Dept_ID') ? 'has-error' : ''}}">
                {!! Form::label('Dept_ID', 'Dept Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Dept_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Dept_ID', '<p class="help-block">:message</p>') !!}
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
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              
            </div>
          </div>
</div>


@endsection