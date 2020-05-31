<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrder extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplier_orders';

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
    protected $fillable = ['total', 'paid', 'due', 'discount', 'comment', 'image', 'supplier_id'];

    public function Supplier()
    {
        return $this->belongsTo('App\Supplier');
    }
    
}
