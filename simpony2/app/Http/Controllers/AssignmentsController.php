<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use App\Assignment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Storage;
use validate;
use App\User;
use App\Step; use App\Files;
use Illuminate\Support\Facades\Redirect;

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

        //Model::all(); = Select * from table model;
        //Model::where = Select * from table model where ()
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
    //form masuk kesini
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    //form yang open dengan method create (route->[post bawa form $request]->store xget xpatch)
    public function store(Request $request)
    {

        $current = date("Y/m/d");
        $rules1 = [

        'Assn_Nama' => 'required',
        'Tgl_Deadline' => 'required|date|after:' . $current

        ];

        $messages = [
        'Tgl_Deadline.date' => 'Tanggal deadline bermasalah'
        ];

        $validation = $this->validate($request, $rules1, $messages);
        
        if($validation != null){
        return Redirect::back()->withErrors($validation);
        }
        

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

         // ----------- e-mail------------ //
            $data = array(
                'user' => "Tonipra",
                'nama_assn' => $request->Assn_Nama,
                'deadline' => $request->Tgl_Deadline
            );

           

            Mail::send('emails.created', $data, function ($message) {
                $message->from('simponi.rcti@gmail.com', 'SIMPONI~');
                $message->to('toni.prabowo47@gmail.com', 'Toni Prabowo')->subject('Pekerjaan Baru Diterima!');
            });
        

           $assignments = Assignment::create(array('Assn_Nama' => $request->Assn_Nama, 'Dept_ID' => $request->Dept_ID, 'Emp_ID_Req_Vald' => $request->Emp_ID_Req_Vald, 'Assn_Deskripsi' => $request->Assn_Deskripsi, 
                'Assn_File' => $fileName, 'Tgl_Deadline'=> $request->Tgl_Deadline, 'HOD_ID'=> $request->HOD_ID));

            Session::flash('flash_message', 'Assignment added!');

            return redirect('assignments/pelacakan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $i
     *
     * @return Response
     */
    public function show($id)
    {

        //assigments[,,,,]
        $assignment = Assignment::find($id);
        //assigments[name,hgid.hodid,staff]
        $steps = \DB::table('steps')->where('Assn_ID','=',$id)->lists('Title', 'ID_Step');
        
        $head = User::find($assignment->HG_ID);
        $staff = User::find($assignment->Staff_Prog_ID_Do);
        $pengirim = User::find($assignment->Emp_ID_Req_Vald);
        $hod = User::find($assignment->HOD_ID);
        //$comments = Comment::all();
        //$commentsu = Comment::with('users')->get();

        $comments = \DB::table('comments')->where('Assn_ID','=',$id)
        ->join('users', function ($join) {
            $join->on('comments.Sender', '=', 'users.User_ID');
        })
        ->get();

        $files = Files::where('Assn_ID','=',$id)->get();

        return view('assignments.show', compact('assignment', 'head', 'staff', 'steps','comments','hod','pengirim','files'));
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

       return Redirect::back();
    }

        //untuk pekerjaandept yang udh di assign
        public function update2($id, Request $request)
    {
        
        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());

        Session::flash('flash_message', 'Assignment updated!');

        return redirect('assignments/pekerjaanDept');
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
        
        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '=', Auth::user()->user_ID )->where('Staff_Prog_ID_Do', '=', 'null' )->paginate(15);
        return view('assignments.listAccepted', compact('assignments1')); //array di index
        
    }

    public function listAssigned()
    {
        
        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->where('Staff_Prog_ID_Do', '!=', 'null' )->paginate(15);
        return view('assignments.listAssigned', compact('assignments1')); //array di index
        
    }

        public function pelacakan()
    {
        //$assignments = Assignment::paginate(15);


        $assignments1 = Assignment::where('Emp_ID_Req_Vald', '=', Auth::user()->user_ID)->where('Milestone','=',NULL)->paginate(20);

        $assignments0 = \DB::table('assignments')->where('Emp_ID_Req_Vald', '=', Auth::user()->user_ID)
        ->join('steps', function ($join) { $join->on('assignments.Milestone', '=', 'steps.ID_Step');})
        ->get();


        return view('assignments.pelacakan', compact('assignments0','assignments1')); //array di index
        
    }


 public function pekerjaanstaff()
    {
        $assignments1 = Assignment::where('Staff_Prog_ID_Do', '=', Auth::user()->user_ID)->where('Milestone','=',NULL)->paginate(20);

        $assignments0 = \DB::table('assignments')->where('Staff_Prog_ID_Do', '=', Auth::user()->user_ID)
        ->join('steps', function ($join) { $join->on('assignments.Milestone', '=', 'steps.ID_Step');})
        ->get();


        //$assignments0 = Assignment::where('Staff_Prog_ID_Do', '=', Auth::user()->user_ID)->paginate(15);
        return view('staff.pekerjaanstaff', compact('assignments0','assignments1')); //array di index
        
    }

    public function melihat($id)
    {
        //$assignments = Assignment::paginate(15); 
        $steps = \DB::table('steps')->where('Assn_ID','=',$id)->lists('Title', 'ID_Step');

        $assignment = Assignment::find($id);
        
        if($assignment->Milestone != null) {
        $stepke = Step::find($assignment->Milestone)->bobot;
        } else {
            $stepke->bobot = 0;
        }
        $head = User::find($assignment->HG_ID);
        $staff = User::find($assignment->Staff_Prog_ID_Do);
        $pengirim = User::find($assignment->Emp_ID_Req_Vald);
        $hod = User::find($assignment->HOD_ID);
        //$comments = Comment::all();
        //$commentsu = Comment::with('users')->get();

        $comments = \DB::table('comments')->where('Assn_ID','=',$id)
        ->join('users', function ($join) {
            $join->on('comments.Sender', '=', 'users.User_ID');
        })
        ->get();

        $files = Files::where('Assn_ID','=',$id)->get();

        return view('klien.melihat', compact('assignment', 'head', 'staff', 'steps','comments','hod','pengirim','files','stepke'));

 
    }


     public function pekerjaanDept()
    {
        $assignments0 = \DB::table('assignments')->where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )
        ->join('steps', function ($join) { $join->on('assignments.Milestone', '=', 'steps.ID_Step');})
        ->get();


        //$assignments = Assignment::paginate(15);
        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->whereNull('Milestone')->paginate(15);
             return view('assignments.pekerjaanDept', compact('assignments0','assignments1')); //array di index
        
    }

     public function departmentassn()
    {
        //$assignments = Assignment::paginate(15);
        $assignments0 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->where('Staff_Prog_ID_Do', '!=', 'null' )->where('Dept_ID', '=', Auth::user()->Dept_Name )->paginate(15);
             return view('assignments.deptAssn', compact('assignments0')); //array di index
        
    }

    public function staffpekerjaan()
    {
        //$assignments = Assignment::paginate(15);


        $assignments0 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '!=', 'null' )->where('Staff_Prog_ID_Do', '=', Auth::user()->user_ID)->paginate(15);
             return view('assignments.deptAssn', compact('assignments0')); //array di index
        
    }


public function hgstaff()
    {
        //$assignments = Assignment::paginate(15);

        $assignments0 = \DB::table('assignments')->where('Assn_Status', '=', 1 )->where('HG_ID', '=', Auth::user()->user_ID)
        ->join('steps', function ($join) { $join->on('assignments.Milestone', '=', 'steps.ID_Step');})
        ->get();

        $assignments1 = Assignment::where('Assn_Status', '=', 1 )->where('HG_ID', '=', Auth::user()->user_ID)->whereNull('Milestone')->paginate(15);
             
        return view('manager.hgstaff', compact('assignments0','assignments1')); //array di index
        
    }

public function staffview($id)
    {
        $steps = \DB::table('steps')->where('Assn_ID','=',$id)->lists('Title', 'ID_Step');
        $assignment = Assignment::find($id);
        $head = User::find($assignment->HG_ID);
        $staff = User::find($assignment->Staff_Prog_ID_Do);
        $pengirim = User::find($assignment->Emp_ID_Req_Vald);
        $hod = User::find($assignment->HOD_ID);
        //$comments = Comment::all();
        //$commentsu = Comment::with('users')->get();

        if($assignment->Milestone != null) {
        $stepke = Step::find($assignment->Milestone)->bobot;
        } else {
            $stepke = 0;
        }

        $comments = \DB::table('comments')->where('Assn_ID','=',$id)
        ->join('users', function ($join) {
            $join->on('comments.Sender', '=', 'users.User_ID');
        })
        ->get();

        $files = Files::where('Assn_ID','=',$id)->get();

        return view('staff.staffview', compact('assignment', 'head', 'staff', 'steps','comments','hod','pengirim','files','stepke'));
        
    }

    public function managerview($id)
    {
        $steps = \DB::table('steps')->where('Assn_ID','=',$id)->lists('Title', 'ID_Step');
        $assignment = Assignment::find($id);
        if($assignment->Milestone == NULL) {
            $stepke = 0;
        } else {
        $stepke = Step::find($assignment->Milestone)->bobot;
        }

        $head = User::find($assignment->HG_ID);
        $staff = User::find($assignment->Staff_Prog_ID_Do);
        $pengirim = User::find($assignment->Emp_ID_Req_Vald);
        $hod = User::find($assignment->HOD_ID);
        //$comments = Comment::all();
        //$commentsu = Comment::with('users')->get();

        $comments = \DB::table('comments')->where('Assn_ID','=',$id)
        ->join('users', function ($join) {
            $join->on('comments.Sender', '=', 'users.User_ID');
        })
        ->get();

        $files = Files::where('Assn_ID','=',$id)->get();

        return view('manager.managerview', compact('assignment', 'head', 'staff', 'steps','comments','hod','pengirim','files','stepke'));
    }


}
