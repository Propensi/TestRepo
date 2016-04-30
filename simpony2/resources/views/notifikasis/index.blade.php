@extends('layouts.master')

@section('content')

    <h1>Notifikasis <a href="{{ url('notifikasis/create') }}" class="btn btn-primary pull-right btn-sm">Add New Notifikasi</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Notif ID</th><th>Assn ID</th><th>Title</th><th>Sender</th><th>Receiver</th><th>Time</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($notifikasis as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('notifikasis', $item->Notif_ID) }}">{{ $item->Notif_ID }}</a></td><td>{{ $item->Assn_ID }}</td><td>{{ $item->Title }}</td><td>{{ $item->Sender }}</td><td>{{ $item->Receiver }}</td><td>{{ $item->Time }}</td>
                    <td>
                        <a href="{{ url('notifikasis/' . $item->Notif_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['notifikasis', $item->Notif_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $notifikasis->render() !!} </div>
    </div>

@endsection
