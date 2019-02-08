<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'country', 'region', 'city','house_number','street','barangay','zip','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
