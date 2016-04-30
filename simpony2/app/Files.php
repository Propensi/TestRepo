<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
 protected $primaryKey = 'File_ID';


    protected $table = "files";

    public $fillable = ['Assn_ID','ID_Step','Nama_File','Size','Type','File'];

 	public $timestamps = false;
}

