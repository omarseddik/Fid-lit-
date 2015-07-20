<?php

namespace Richflor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Client extends Model
{
     use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname','phonenumber','birthdate','email','cin','gender','points','active'];


    protected $dates = ['deleted_at' ];

    public function scopeWomen($query)
    {
        return $query->whereGender('F');
    }
    public function operations()
    {
        return $this->hasMany('Richflor\Operation');
    }

}
