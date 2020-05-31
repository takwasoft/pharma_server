<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrderReturnLine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_order_return_lines';

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
    protected $fillable = ['quantity', 'price', 'discount', 'subtotal', 'customer_order_return_id', 'medicine_id', 'medicine_unit_type_id'];

    public function CustomerOrderReturn()
    {
        return $this->belongsTo('App\CustomerOrderReturn');
    }
    public function MedicineUnitType()
    {
        return $this->belongsTo('App\MedicineUnitType');
    }
    
}
