<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffDuty extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff_duties';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['start_time', 'end_time', 'day', 'staff_id'];

    
}
