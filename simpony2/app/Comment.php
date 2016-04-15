<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'Numb_Message';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Comment', 'Assn_ID', 'Step_ID', 'Sender', 'Receiver'];



    public function user()
    {
        return $this->belongsTo('App\User','Sender', 'User_ID');
    }
}
