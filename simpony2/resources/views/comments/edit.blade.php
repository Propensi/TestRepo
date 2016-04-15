@extends('layouts.master')

@section('content')

    <h1>Edit Comment</h1>
    <hr/>

    {!! Form::model($comment, [
        'method' => 'PATCH',
        'url' => ['comments', $comment->Numb_Message],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('Comment') ? 'has-error' : ''}}">
                {!! Form::label('Comment', 'Comment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Comment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Comment', '<p class="help-block">:message</p>') !!}
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