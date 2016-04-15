@extends('layouts.master')

@section('content')

    <h1>Comment</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $comment->Numb_Message }}</td> <td> {{ $comment->Comment }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection