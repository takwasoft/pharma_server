<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffPayment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff_payments';

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
    protected $fillable = ['salary', 'paid', 'due', 'month', 'year', 'details', 'staff_id'];

    public function Staff()
    {
        return $this->belongsTo('App\Staff');
    }
    
}
