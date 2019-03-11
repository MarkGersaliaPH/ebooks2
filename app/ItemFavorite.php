<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ItemFavorite extends Model
{
    //
    protected $fillable = ['item_id','customer_id'];


    public static function isAlreadyAddedToFavorite($id){
        $customer_id = isset(Auth::user()->id) ? Auth::user()->id : 1;
        $book_id = $id;
        $isAlreadyAdded = ItemFavorite::whereCustomerId($customer_id)->whereItemId($book_id)->first();
        return isset($isAlreadyAdded) ? true : false;
    }
}
