@extends('layouts.admin_template')

@section('content')

<table class="table table-bordered table-striped table-hover">
                <thead>
                    <h4> Request Ditolak </h4>
                    <tr>
                         <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Deadline</th><th>Created</th>
                     </tr>
                </thead>
                <tbody>
           {{-- */$x=0;/* --}}
            @foreach($assignments2 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at}} </td>
                </tr>
                @endforeach
                <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request ditolak.</td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                <tbody>
            </table>
    <div class="pagination"> {!! $assignments2->render() !!}</div>
@endsection