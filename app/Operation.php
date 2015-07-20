<?php

namespace Richflor;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'operations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['prestation','montant','client_id'];

    public function client()
    {
        return $this->belongsTo('Richflor\Client');
    }
}
