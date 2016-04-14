@extends('layouts.admin_template')

@section('content')

    <h1>Assignment</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th> <th>Judul</th><th>Deskripsi</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>{{ $assignment->Assn_ID }}</td> <td> {{ $assignment->Assn_Nama }} </td><td> {{ $assignment->Assn_Deskripsi}} </td><td> {{ $assignment->Tgl_Deadline }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection