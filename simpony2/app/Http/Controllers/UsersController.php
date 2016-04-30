<?php
 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$users = User::paginate(15);

        $users = \DB::table('users')->join('departments', function ($join) {
            $join->on('users.Dept_name', '=', 'departments.Dept_ID');
        })
        ->paginate(100);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $departments = \DB::table('departments')->lists('dept_name', 'dept_id');
        $users = \DB::table('users')->lists('name', 'user_ID');
        return view('users.create', compact('users','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $data)
    {
        
        User::create([
            'name' => $data['name'],
            'no_peg' => $data['no_peg'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'Dept_name' => $data['Dept_name']
        ]);


        

        Session::flash('flash_message', 'User added!');

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($user_ID)
    {
        $user = User::findOrFail($user_ID);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($user_ID)
    {
        
        $departments = \DB::table('departments')->lists('dept_name', 'dept_id');
        $users = \DB::table('users')->lists('name', 'user_ID');
        $user = User::findOrFail($user_ID);

        return view('users.edit', compact('user','departments','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($user_ID, Request $request)
    {
        
        $user = User::findOrFail($user_ID);
        $user->update($request->all());

        Session::flash('flash_message', 'User updated!');

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($user_ID)
    {
        User::destroy($user_ID);

        Session::flash('flash_message', 'User deleted!');

        return redirect('users');
    }

}
