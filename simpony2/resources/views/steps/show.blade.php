@extends('layouts.master')

@section('content')

    <h1>Step</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>ID Step</th><th>Assn ID</th><th>Title</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $step->ID_Step }}</td> <td> {{ $step->ID_Step }} </td><td> {{ $step->Assn_ID }} </td><td> {{ $step->Title }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection