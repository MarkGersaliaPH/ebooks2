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
        
        alertify()->success('Item added to cart')->delay(10000)->position('bottom right');
            
        return redirect()->back();
    }

    public function index(){
        $collection = Cart::with('book')->whereCustomerId(Auth::id())->get();
                
        $unique = $collection->unique(); 
        $data['data'] =  $unique->values('book.id')->all();  
        $data['cart_total'] = 0;
        $data['shipping_fee'] = 50;
 
        return view('frontend.cart',$data);
    }
    
    public function remove($id){
 
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with(['success'=>'Item removed from cart']);
    }
}
