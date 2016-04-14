<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Department;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DepartmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $departments = Department::paginate(15);

        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['Dept_Name' => 'required', ]);

        Department::create($request->all());

        Session::flash('flash_message', 'Department added!');

        return redirect('departments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['Dept_Name' => 'required', ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        Session::flash('flash_message', 'Department updated!');

        return redirect('departments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Department::destroy($id);

        Session::flash('flash_message', 'Department deleted!');

        return redirect('departments');
    }

}
