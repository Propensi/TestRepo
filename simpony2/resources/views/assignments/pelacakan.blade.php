@extends('layouts.admin_template')

@section('content')

    
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
            @foreach($assignments0 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at }} </td>
                    <td>

                       <a class="btn btn-primary btn-xs" href="{{ url('assignments', $item->Assn_ID) }}">lihat</a>
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
    
@endsection
