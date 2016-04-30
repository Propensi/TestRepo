<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $primaryKey = 'Notif_ID';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notifikasis';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Title', 'Receiver', 'Assn_ID', 'Time', 'Sender'];

}
