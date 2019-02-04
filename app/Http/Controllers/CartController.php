<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Auth;
class CartController extends Controller
{
    //
    public function add(Request $request){
        Cart::create($request->all());
        return redirect()->back()->with(['success'=>'Item added to cart']);
    }

    public function index(){
        $data['data'] = Cart::whereCustomerId(Auth::id())->get();
        return view('frontend.cart',$data);
    }
}
