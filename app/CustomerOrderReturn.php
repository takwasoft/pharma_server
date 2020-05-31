<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOrderReturn extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customer_order_returns';

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
    protected $fillable = ['comment', 'total', 'discount', 'paid', 'due', 'customer_order_id'];

    public function CustomerOrder()
    {
        return $this->belongsTo('App\CustomerOrder');
    }
    
}
