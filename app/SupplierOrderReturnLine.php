<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrderReturnLine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplier_order_return_lines';

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
    protected $fillable = ['quantity', 'price', 'discount', 'subtotal', 'supplier_order_return_id', 'medicine_id', 'medicine_unit_type_id'];

    public function SupplierOrderReturn()
    {
        return $this->belongsTo('App\SupplierOrderReturn');
    }
    public function MedicineUnitType()
    {
        return $this->belongsTo('App\MedicineUnitType');
    }
    
}
