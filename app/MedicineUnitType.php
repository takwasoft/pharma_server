<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineUnitType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicine_unit_types';

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
    protected $fillable = ['quantity', 'buying_Price', 'selling_price', 'medicine_id', 'unit_type_id'];

    public function Medicine()
    {
        return $this->belongsTo('App\Medicine');
    }
    public function UnitType()
    {
        return $this->belongsTo('App\UnitType');
    }
    
}
