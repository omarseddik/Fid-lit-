<?php

namespace Richflor;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
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
    protected $fillable = ['firstname', 'lastname','phonenumber','email', 'birthdate','cin','gender','active'];


    public function scopeWomen($query)
    {
        return $query->whereGender('F');
    }
}
