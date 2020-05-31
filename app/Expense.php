<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'expenses';

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
    protected $fillable = ['cost', 'paid', 'due', 'details', 'image', 'expense_type_id'];

    public function ExpenseType()
    {
        return $this->belongsTo('App\ExpenseType');
    }
    
}
