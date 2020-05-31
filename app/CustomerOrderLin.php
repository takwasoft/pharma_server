<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrderLin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_order_lins';

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
    protected $fillable = ['quantity', 'price', 'discount', 'subtotal', 'customer_order_id', 'medicine_id', 'medicine_unit_type_id'];

    public function CustomerOrder()
    {
        return $this->belongsTo('App\CustomerOrder');
    }
    public function Medicine()
    {
        return $this->belongsTo('App\Medicine');
    }
    public function MedicineUnitType()
    {
        return $this->belongsTo('App\MedicineUnitType');
    }
    
}
