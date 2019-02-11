<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Books;
use App\User;
use App\Address;
use DB;
class OrderController extends Controller
{
    //
    protected $fillable = [
        'item_id', 'customer_id', 'quantity','status','payment_method'
    ];

    public function view($id){
        $id = intval($id);
        $order = Order::find($id);
        $data['order'] = $order;
        $data['customer'] = User::with('address')->find($order->customer_id); 
        $data['book'] = Books::withTrashed()->find($order->book_id);
        
        return response()->json($data);
    }
}
