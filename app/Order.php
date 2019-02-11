<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function book(){
        return $this->belongsTo('App\Books','book_id','id');
    }

    
    public function customer(){
        return $this->belongsTo('App\User','customer_id');
    }

    public function address(){ 
        return $this->belongsTo('App\Address','customer_id','user_id');
    }

    public static function countOrder($id){
        return Order::whereBookId($id)->count();
    }
}
