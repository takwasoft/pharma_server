<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierOrderReturn extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplier_order_returns';

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
    protected $fillable = ['comment', 'total', 'discount', 'paid', 'due', 'supplier_order_id'];

    public function SupplierOrder()
    {
        return $this->belongsTo('App\SupplierOrder');
    }
    
}
