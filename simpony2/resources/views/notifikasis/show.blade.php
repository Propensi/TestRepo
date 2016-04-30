@extends('layouts.master')

@section('content')

    <h1>Notifikasi</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Notif ID</th><th>Assn ID</th><th>Title</th><th>Sender</th><th>Receiver</th><th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $notifikasi->Notif_ID }}</td> <td> {{ $notifikasi->Notif_ID }} </td><td> {{ $notifikasi->Assn_ID }} </td><td> {{ $notifikasi->Title }} </td><td> {{ $notifikasi->Sender }} </td><td> {{ $notifikasi->Receiver }} </td><td> {{ $notifikasi->Time }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection