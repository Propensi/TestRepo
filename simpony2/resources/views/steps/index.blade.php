@extends('layouts.master')

@section('content')

    <h1>Steps <a href="{{ url('steps/create') }}" class="btn btn-primary pull-right btn-sm">Add New Step</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>ID Step</th><th>Title</th><th>Deskripsi</th>
                </tr>
            </thead>
            <tbody> 
            {{-- */$x=0;/* --}}
            @foreach($steps as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!--<td>{{ $x }}</td>-->
                    <td><a href="{{ url('steps', $item->ID_Step) }}">{{ $item->ID_Step }}</a></td><td>{{ $item->Title }}</td><td>{{ $item->Step }}</td>
                    <td>
                        <a href="{{ url('steps/' . $item->ID_Step . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['steps', $item->ID_Step],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>

@endsection
