@extends('layouts.admin_template')

@section('content')

<div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <h4> Assign Assignment </h4>
                    <tr>
                         <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Deadline</th>
                     </tr>
                </thead>
                <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments1 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td><td> {{ $item->Tgl_Deadline }} </td>
                    <td>
                        <!-- nge link ke posts/ idnya berapa /edit-->
                        <a href="{{ url('assignments/' . $item->Assn_ID . '/assignStaff') }}"><button type="submit" class="btn btn-primary btn-xs">Assign Staff</button></a>
                    </td>
                </tr>
                @endforeach

                <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request masuk (assign).</td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                <tbody>
            </table>
    <div class="pagination"> {!! $assignments1->render() !!} </div>
</div>

@endsection