<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Order;
use Auth;
use App\Helpers\FileUpload;
class AdminController extends Controller
{
    //

    public function index(){

        // $file = FileUpload::save();
        return view('cms.dashboard');
    }

    public function save_image(Request $request){
        $path = public_path('/img/uploads/'. Auth::user()->id . '/');
        // $image = $request->file('image')->getClientOriginalName();
        $image = $request->file('image');
        $input['imagename'] = time() . '.jpg';

        
        $image->move($path, $input['imagename']);
    }

    public function books(){ 
        $data['books'] = Books::orderBy('created_at','DESC')->get();
        $data['books_archive'] = Books::onlyTrashed()->orderBy('created_at','DESC')->get();
        return view('cms.books',$data);
    }

    public function orders(){
        $collection = Books::with('orders')->get();
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
