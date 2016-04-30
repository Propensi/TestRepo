<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    protected $primaryKey = 'Assn_ID';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Assn_ID', 'Staff_Prog_ID_Do', 'Emp_ID_Req_Vald', 'Assn_Nama', 'Assn_Deskripsi', 'Assn_File', 'Assn_Status', 'Tgl_Request', 'Tgl_Deadline', 'HG_ID', 'HOD_ID' ,'Milestone', 'Dept_ID','Hg_Val','Hod_Val'];

        public function allAssignment() {
        return $this->belongsToMany('App\Assignment');
        
    }
}
