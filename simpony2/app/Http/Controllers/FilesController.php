<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Storage;
use validate;
use App\Files;
use Session;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function handleUpload(Request $request) {





        // if($request->hasFile('file')){
        //     $file = $request->File('file');
            
        //     $allowedFileTypes = config('app.allowedFileTypes');
        //     $maxFileSize = config('app.maxFileSize');
        //     //rulesVariable
        //     $rules = [
        //         'file' => 'max:'.$maxFileSize
        //     ];
        //     $this->validate($request, $rules);
            
        //     $fileName = $file->getClientOriginalName();
        //     $destinationPath = config('app.fileDestinationPath').'/'.$fileName;
        //     $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

        //     if($uploaded) {
        //         //whateverUwantToDo
        //        Files::create([
        //             'Nama_File'=>$fileName,
        //             'File' => $fileName

        //         ]);
        //     }
        // }


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

                $assignments = Files::create(array( 'Nama_File'=>$fileName, 'File' => $fileName, 'Assn_ID'=>$request->Assn_ID, 'ID_Step'=>$request->ID_Step));

            }

        }

            // $assignments = new Assignment;
            // $assignments = $request;
            // $assignments->Assn_Nama = 'adhika';
            // $assignments->create();

           // Assignment::create($request->all());
           
            Session::flash('flash_message', 'Assignment added!');

        return Redirect::back();
    }

    public function upload(){
        return view('files.upload');
    }
}
