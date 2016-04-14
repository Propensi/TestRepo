@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcomee</div>
				
                    Your Application's Landing Page.

                    <p>Explore</p>
                    <li><a href="{{url('/assignments')}}">Assignments</li>
                    <li><a href="{{url('/departments')}}">Departments</li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
