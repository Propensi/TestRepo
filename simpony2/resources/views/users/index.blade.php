@extends('layouts.admin_template')

@section('content')

    <h1>Users  <a href="{{ url('users/create') }}" class="btn btn-primary pull-right btn-sm">Menambah User</a> </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th><th>Name</th><th>No Peg</th><th>Email</th><th>Role</th><th>Departemen</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!--<td>{{ $x }}</td>-->
                    <td>{{ $x }}</td><td><a href="{{ url('users', $item->user_ID) }}">{{ $item->name }}</a></td><td>{{ $item->no_peg }}</td><td>{{ $item->email }}</td><td>{{ $item->role }}</td><td>{{ $item->Dept_name }}</td>
                    <td>
                        <a href="{{ url('users/' . $item->user_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> / 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['users', $item->user_ID],
                            'style' => 'display:inline',
                            'class' => 'delete'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $users->render() !!} </div>
    </div>

    <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>

@endsection
