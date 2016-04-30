@extends('layouts.admin_template')

@section('content')

    <h1>Assigments <a href="{{ url('assignments/create') }}" class="btn btn-primary pull-right btn-sm">Add New Assignment</a></h1>
    <div class="table">

                                                            <!-- TABEL 1 -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Request Masuk </h4>

                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Deadline</th><th>Created</th><th> Action </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}

            <!-- klo ada dollar itu artinya dia minta variiable ke asssignmentcontroller -->
            @foreach($assignments0 as $item)
                {{-- */$x++;/* --}}

                    <?php 
                        $texts='';
                        if(strlen($item->Assn_Deskripsi) > 20) {
                            
                          $texts = substr($item->Assn_Deskripsi, 0, 20).'...';
                          
                        } else {
                            $texts = $item->Assn_Deskripsi;
                        }

                        $date = substr($item->created_at, 0,10);


                    ?>

                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $texts}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $date }} </td>
                    <td>
                       
                        <!-- ini punya Terima-->
                      {!! Form::open([
                            'method'=>'PATCH',
                            'url' => ['assignments', $item->Assn_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Approve', ['class' => 'btn btn-primary btn-xs'] ) !!}
                            {!! Form::hidden('Assn_Status','1') !!}
                        {!! Form::close() !!}

                        /
                 
                    <!-- ini punya reject -->
                    {!! Form::open([
                            'method'=>'PATCH',
                            'url' => ['assignments', $item->Assn_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Reject', ['class' => 'btn btn-danger btn-xs'] ) !!}
                            {!! Form::hidden('Assn_Status','2') !!}
                        {!! Form::close() !!}
                        </td> 
                </tr>
            @endforeach
              <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request masuk.</td><td></td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                </tbody>
        </table>

                                                    <!-- TABEL 2 -->

            <!--request diterima-->
            <hr>   
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <h4> Request Diterima </h4>
                    <tr>
                         <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Deadline</th><th>Created</th>
                     </tr>
                </thead>
                <tbody>
            {{-- */$x=0;/* --}}
             
            @foreach($assignments1 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at}} </td>
                

                <td>
                        <!-- nge link ke posts/ idnya berapa /edit-->
                        <a href="{{ url('assignments/' . $item->Assn_ID . '/assign') }}"><button type="submit" class="btn btn-primary btn-xs">Assign</button></a>
                    </td>
                
                </tr>

                @endforeach
                <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request diterima.</td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                <tbody>
            </table>
    <div class="pagination"> {!! $assignments1->render() !!}</div>
    
    </div>
    
@endsection
