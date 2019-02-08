<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $fillable = [
        'item_id', 'customer_id', 'quantity','status','payment_method'
    ];

    public function add($data){
        
    }
}
