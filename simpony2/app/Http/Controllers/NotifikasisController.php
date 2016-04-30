<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Notifikasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;


class NotifikasisController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notifikasis = Notifikasi::paginate(15);

        return view('notifikasis.index', compact('notifikasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('notifikasis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        

        Session::flash('flash_message', 'Notifikasi added!');

        $title = ('Reminder untuk Assignment : '.$request->Title);

        Notifikasi::create(array('Title' => $title, 'Receiver' => $request->Receiver, 'Assn_ID' => $request->Assn_ID, 'Sender' => $request->Sender));

        return Redirect::back();
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
        $notifikasi = Notifikasi::findOrFail($id);

        return view('notifikasis.show', compact('notifikasi'));
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
        $notifikasi = Notifikasi::findOrFail($id);

        return view('notifikasis.edit', compact('notifikasi'));
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
        
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->update($request->all());

        Session::flash('flash_message', 'Notifikasi updated!');

        return redirect('notifikasis');
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
        Notifikasi::destroy($id);

        Session::flash('flash_message', 'Notifikasi deleted!');

        return redirect('notifikasis');
    }

}
