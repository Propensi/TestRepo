@extends('layouts.master')

@section('content')

    <h1>Comments <a href="{{ url('comments/create') }}" class="btn btn-primary pull-right btn-sm">Add New Comment</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Comment</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($comments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('comments', $item->Numb_Message) }}">{{ $item->Comment }}</a></td>
                    <td>
                        <a href="{{ url('comments/' . $item->Numb_Message . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['comments', $item->Numb_Message],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $comments->render() !!} </div>
    </div>

 <!--   <h1>Create New Comment</h1>
    <hr/>

    {!! Form::open(['url' => 'comments', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('Comment') ? 'has-error' : ''}}">
                {!! Form::label('Comment', 'Comment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Comment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Comment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}-->

@endsection
