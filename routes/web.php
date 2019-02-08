<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Books;
Route::get('/', function () {
    $data['books'] = Books::All();
    return view('frontend.index',$data);
});

Auth::routes();

Route::get('/home', 'AdminController@books')->name('home');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');

Route::post('/place_order', 'CheckoutController@place_order')->name('place_order');


Route::get('page/books/view/{id}','BooksController@front_view')->name('pages.books.view');

Route::group(['prefix'=>'cart'],function(){ 
    Route::get('/', 'CartController@index')->name('carts');
    Route::post('/add', 'CartController@add')->name('carts.add');
    Route::get('/remove/{id}', 'CartController@remove')->name('cart.remove');
    
});

Route::group(['prefix'=>'books'],function(){
    Route::post('/add', 'BooksController@add')->name('books.add');
    Route::get('/delete/{id}', 'BooksController@delete')->name('books.delete');
    Route::get('/edit/{id}', 'BooksController@edit')->name('books.edit');
    Route::post('/update/', 'BooksController@update')->name('books.update');
});

