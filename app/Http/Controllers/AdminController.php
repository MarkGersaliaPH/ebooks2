<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class AdminController extends Controller
{
    //

    public function books(){
        $data['books'] = Books::All();
        return view('cms.books',$data);
    }
}
