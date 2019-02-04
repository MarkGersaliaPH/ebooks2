<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'customer_id', 'quantity',
    ];

    public function book(){
        return $this->belongsTo('App\Books','item_id');
    }

    public static function count($customer_id){
       return Cart::whereCustomerId($customer_id)->count();
    }
}
