<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'medicines';

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
    protected $fillable = ['buying_price', 'selling_price', 'quantity', 'details', 'image', 'groupname_id', 'manufacturer_id', 'shelf_id', 'medicine_type_id'];

    
}
