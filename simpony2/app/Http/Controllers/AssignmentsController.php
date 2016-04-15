<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Assignment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Storage;
use validate;
use App\User;
use App\Step;

use Illuminate\Support\Facades\Auth;

use App\Comment;

class AssignmentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$assignments = Assignment::paginate(15);

        $assignments0 = Assignment::where('Assn_Status', '=', 0)->paginate(15);
        $assignments1 = Assignment::where('Assn_Status', '=', 1)->whereNull('HG_ID')->paginate(15);
        return view('assignments.index', compact('assignments0','assignments1')); //array di index
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $fileName ='';
        if($request->hasFile('file')){
            $file = $request->file('file');
            
            $allowedFileTypes = config('app.allowedFileTypes');
            $maxFileSize = config('app.maxFileSize');
            //rulesVariable
            $rules = [
                'file' => 'max:'.$maxFileSize
            ];

            $this->validate($request, $rules);
            
            $fileName = $file->getClientOriginalName();
            $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

            if($uploaded) {
                $request->Assn_File = $fileName;
            }

        }

            // $assignments = new Assignment;
            // $assignments = $request;
            // $assignments->Assn_Nama = 'adhika';
            // $assignments->create();

           // Assignment::create($request->all());
           $assignments = Assignment::create(array('Assn_Nama' => $request->Assn_Nama, 'Dept_ID' => $request->Dept_ID, 'Emp_ID_Req_Vald' => $request->Emp_ID_Req_Vald, 'Assn_Deskripsi' => $request->Assn_Deskripsi, 
                'Assn_File' => $fileName, 'Tgl_Deadline'=> $request->Tgl_Deadline));
            Session::flash('flash_message', 'Assignment added!');

            return redirect('assignments');

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
        $steps = \DB::table('steps')->where('Assn_ID','=',$id)->lists('Title', 'ID_Step');
        $assignment = Assignment::find($id);
        $head = User::find($assignment->HG_ID);
        $staff = User::find($assignment->Staff_Prog_ID_Do);
        $pengirim = User::find($assignment->Emp_ID_Req_Vald);
        $hod = User::find($assignment->HOD_ID);
        //$comments = Comment::all();
        //$commentsu = Comment::with('users')->get();

        $comments = \DB::table('comments')
        ->join('users', function ($join) {
            $join->on('comments.Sender', '=', 'users.User_ID');
        })
        ->get();

        return view('assignments.show', compact('assignment', 'head', 'staff', 'steps','comments','hod','pengirim'));
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
        $assignment = Assignment::findOrFail($id);

        return view('assignments.edit', compact('assignment'));
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
        
        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());

        Session::flash('flash_message', 'Assignment updated!');

        return redirect('assignments');
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
        Assignment::destroy($id);
        Session::flash('flash_message', 'Assignment deleted!');
        return redirect('assignments');
    }

       public function rejected() //method dr ayu
    {
         $assignments2 = Assignment::where('Assn_Status', '=', 2)->paginate(15);
        return view('assignments.rejected')->with(compact('assignments2'));
    }

    //method dr kendy
     public function assign($id)
    {
        $aser = \DB::table('users')->where('role','=','Head Group')->lists('name', 'user_ID');
        $assignment = Assignment::findOrFail($id);
        //$assignment->update($request->all());
        return view('assignments.assign')->with('assignment', $assignment)->with('aser',$aser);
    }

    public function assignStaff($id)
    {   
        $steps = Step::where('Assn_ID','=',$id)->paginate(15);
        $eser = \DB::table('users')->where('role','=','Staff')->lists('name', 'user_ID');
        $assignment = Assignment::findOrFail($id);
        //$step = \DB::table('steps')->where('Assn_ID','=',$id);
        //$assignment->update($request->all());
        return view('assignments.assignStaff')->with('assignment', $assignment)->with('eser',$eser)->with('steps',$steps);
    }

    public function listAccepted()
    {
        
        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->paginate(15);
        return view('assignments.listAccepted', compact('assignments1')); //array di index
        
    }

    public function listAssigned()
    {
        
        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->where('Staff_Prog_ID_Do', '!=', 'null' )->paginate(15);
        return view('assignments.listAccepted', compact('assignments1')); //array di index
        
    }

        public function pelacakan()
    {
        //$assignments = Assignment::paginate(15);

        $assignments0 = Assignment::where('Emp_ID_Req_Vald', '=', Auth::user()->user_ID)->paginate(15);
        return view('assignments.pelacakan', compact('assignments0')); //array di index
        
    }

}
