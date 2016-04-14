@extends('layouts.admin_template')

@section('content')
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>


    <div class='row'>
        <div class='col-md-6'>
            <!-- Box -->
        </div><!-- /.col -->

        <div class='col-md-6'>
           
        </div><!-- /.col -->

    </div><!-- /.row -->
@endsection

