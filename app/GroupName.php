<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupName extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'group_names';

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
    protected $fillable = ['name', 'details'];

    public function medicines()
    {
        return $this->hasMany('App\Medicine');
    }
    
}
