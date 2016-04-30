<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'steps';
    protected $primaryKey = 'ID_Step';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ID_Step', 'Assn_ID', 'Title', 'Step', 'bobot'];
    public $timestamps = false;

}
