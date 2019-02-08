<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Address;
use App\Order;
use Auth;

class CheckoutController extends Controller
{
    //
    
    public function index(){

        $collection = Cart::with('book')->whereCustomerId(Auth::id())->get();
        $total = 0;
        $data['data'] =   $collection;  
        foreach($collection as $cart_data){
            $total += $cart_data->book->price;

        }
          
        $data['total'] = $total;
        $data['shipping_fee'] = 50;
        return view('frontend.checkout',$data);
    }

    public function place_order(Request $request){
        $id = Auth::user()->id;
        $user_id = ['user_id'=>$id];   
        $success = Address::updateOrCreate(
            ['user_id'   => Auth::user()->id],
            $request->all()
        );  

        $cart_datas = Cart::with('book')->whereCustomerId(Auth::id())->get();
      
        foreach($cart_datas as $key => $cart_data){ 

            
                $order = new Order; 
                $order->item_id = $cart_data->item_id;
                $order->customer_id = $cart_data->customer_id;
                $order->quantity = $cart_data->quantity;
                $order->status = 'pending';
                $order->payment_method = $request->payment_method;
                $order->save();
 
                
            Cart::whereId($cart_data->id)->delete();  
            // Order::create($cart_data);
        }   
        
       
        
    
        if($success){ 
                return redirect('/')->with(['success'=>'Order recieved']);
        }else{
            
            return redirect()->back()->with(['error'=>'Something went wrong']);
        }
    
    }
} 
