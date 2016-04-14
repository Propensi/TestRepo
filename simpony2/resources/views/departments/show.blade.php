@extends('layouts.admin_template')

@section('content')

    <h1>Department</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Dept Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $department->Dept_ID }}</td> <td> {{ $department->Dept_Name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection