@extends('layouts.admin_template')

@section('content')

    <h1>Assigments <a href="{{ url('assignments/create') }}" class="btn btn-primary pull-right btn-sm">Add New Assignment</a></h1>
    <div class="table">

                                                            <!-- TABEL 1 -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Pekerjaan Departemen </h4>

                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Progress</th><th>Deadline</th><th>Created</th><th> Action </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
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
                    <td><a href="{{  $item->Assn_ID }}/managerview">{{ $item->Assn_Nama }}</a></td><td> {{ $texts}} </td>

                    <td>

                        <?php echo'
                            <div class="progress progress-xs">             
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$item->bobot,'%">                  
                                    <span class="sr-only">80% Complete (warning)</span>
                                </div>
                            </div>
                            '; ?>
                        </td>
                    <td> {{ $item->Tgl_Deadline }} </td><td> {{ $date }} </td>
                    <td>
                       
                        <a class="btn btn-primary btn-xs" href="{{  $item->Assn_ID }}/managerview">lihat</a>
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


 <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Pekerjaan Departemen (idle) </h4>

                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Progress</th><th>Deadline</th><th>Created</th><th> Action </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments1 as $item)
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
                    <td><a href="{{  $item->Assn_ID }}/managerview">{{ $item->Assn_Nama }}</a></td><td> {{ $texts}} </td>

                    <td>

                        <?php echo'
                            <div class="progress progress-xs">             
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$item->bobot,'%">                  
                                    <span class="sr-only">80% Complete (warning)</span>
                                </div>
                            </div>
                            '; ?>
                        </td>
                    <td> {{ $item->Tgl_Deadline }} </td><td> {{ $date }} </td>
                    <td>
                       
                        <a class="btn btn-primary btn-xs" href="{{  $item->Assn_ID }}/managerview">lihat</a>
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
    </div>
    
@endsection
