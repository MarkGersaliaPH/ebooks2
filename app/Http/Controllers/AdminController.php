<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Order;
class AdminController extends Controller
{
    //

    public function books(){
        $data['books'] = Books::All();
        $data['books_archive'] = Books::onlyTrashed()->get();
        return view('cms.books',$data);
    }

    public function orders(){
        $collection = Books::with('orders')->onlyTrashed()->get();
        $collection = $collection->where('orders.id','!=',null);
        $data['orders'] = $collection;
        return view('cms.orders.index',$data);
    }

    public function order_book($id){
        $orders = Order::where('book_id',$id)->get();   
        $data['orders'] = $orders;
        $data['book'] = Books::withTrashed()->find($id);    
        return view('cms.orders.item',$data);
    }

    
}
