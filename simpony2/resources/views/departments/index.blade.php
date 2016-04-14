@extends('layouts.admin_template')

@section('titles')

<!-- <div class="pageheader"><h1>Departments</h1> </div>-->
@endsection

@section('content')

    <h1>Departments <a href="{{ url('departments/create') }}" class="btn btn-primary pull-right btn-sm">Add New Department</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>Department ID</th></th><th>Department Name</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($departments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td>{{ $x }}</td> -->
                    <td><a href="{{ url('departments', $item->Dept_ID) }}">{{ $item->Dept_ID }}</a></td>
                    <td><a href="{{ url('departments', $item->Dept_ID) }}">{{ $item->Dept_Name }}</a></td>
                    <td>
                        <a href="{{ url('departments/' . $item->Dept_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['departments', $item->Dept_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $departments->render() !!} </div>
    </div>

@endsection
