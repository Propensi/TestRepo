@extends('layouts.admin_template')

@section('content')

    <!-- Halaman ini digunakan untuk melihat assignment yang diajukan ke orang lain -->
    <div class="table">

                                                            <!-- TABEL 1 -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Melacak Assignment Anda </h4>

                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Progress</th><th>Deadline</th><th>Created</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments0 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{  $item->Assn_ID }}/melihat">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td>
                    


                    <td> 

                        <?php echo'
                            <div class="progress progress-xs">             
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$item->bobot,'%">                  
                                    <span class="sr-only">80% Complete (warning)</span>
                                </div>
                            </div>
                            '; ?>



                     </td>

                    <td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at }} </td>
                    <td>

                       <a class="btn btn-primary btn-xs" href="{{  $item->Assn_ID }}/melihat">lihat</a>
                        <!-- ini punya Terima-->
                     
                        </td> 
                </tr>
            @endforeach
              <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada Assignment.</td><td></td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                </tbody>
        </table>

         <hr>
        <br>

                                                    <!-- TABEL 1 -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Assignment (menunggu)  </h4>

                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Progress</th><th>Deadline</th><th>Created</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments1 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td>
                    


                    <td> 

                        <?php echo'
                            <div class="progress progress-xs">             
                              <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{ $assignment->Milestone }}" aria-valuemin="0" aria-valuemax="100" style="width:',$item->bobot,'%">                  
                                    <span class="sr-only">80% Complete (warning)</span>
                                </div>
                            </div>
                            '; ?>



                     </td>

                    <td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at }} </td>
 
                </tr>
            @endforeach
              <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada Assignment.</td><td></td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                </tbody>
        </table>
    
@endsection
