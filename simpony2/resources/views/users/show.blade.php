@extends('layouts.admin_template')

@section('content')

    <h1>User</h1> 
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Nama</th><th>Nomor Pegawai</th><th>Email</th><th>Role</th><th>Departemen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->user_ID }}</td> <td> {{ $user->name }} </td><td> {{ $user->no_peg }} </td><td> {{ $user->email }} </td><td> {{ $user->role }} </td><td> {{ $user->Dept_name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection