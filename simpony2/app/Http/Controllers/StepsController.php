<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Assignment;
use App\Step;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\User;


use Illuminate\Support\Facades\Redirect;
class StepsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $steps = Step::paginate(15);
        //$steps = Step::where('Assn_ID','=','1')->paginate(15);
        return view('steps.index', compact('steps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('steps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Step::create($request->all());
        $id = $request->Assn_ID;
        Session::flash('flash_message', 'Step added!');

        $steps = Step::where('Assn_ID','=',$id)->paginate(15);
        $eser = \DB::table('users')->where('role','=','Staff')->lists('name', 'user_ID');
        $assignment = Assignment::findOrFail($id);

        return Redirect::back();
        //return view('assignments.assignStaff')->with('assignment', $assignment)->with('eser',$eser)->with('steps',$steps);
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
        $step = Step::findOrFail($id);

        return view('steps.show', compact('step'));
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
        $step = Step::findOrFail($id);

        return view('steps.edit', compact('step'));
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
        
        $step = Step::findOrFail($id);
        $step->update($request->all());

        Session::flash('flash_message', 'Step updated!');

        return Redirect::action('AssignmentsController@assignStaff', array($request->Assn_ID));
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
        Step::destroy($id);

        Session::flash('flash_message', 'Step deleted!');

        return Redirect::back();
    }

}
