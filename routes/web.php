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
    $data['books'] = Books::published()->get();
    $view = view_path('frontend.index');
    return view('frontend.index',$data);
});

Route::get('send',function(){ 
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail("markgersalia.codev@gmail.com","My subject",$msg)){
    echo "Mail sent";
}
});


Route::post('/save_img','AdminController@save_image');

Route::get('bar-chart', 'ChartController@index');


Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');

Route::get('/uikit',function(){
    return view('layouts.uikit');
});


Route::get('/item/add_to_favorites/{id}','BooksController@add_favorites')->name('favorites.add');

Route::get('/checkout', 'CheckoutController@index')->name('checkout');

Route::post('/place_order', 'CheckoutController@place_order')->name('place_order');


Route::get('page/books/view/{id}','BooksController@front_view')->name('pages.books.view');

Route::group(['prefix'=>'cart'],function(){ 
    Route::get('/', 'CartController@index')->name('carts');
    Route::post('/add', 'CartController@add')->name('carts.add');
    Route::get('/remove/{id}', 'CartController@remove')->name('cart.remove');
    
});
Route::group(['prefix'=>'orders'],function(){ 
    Route::get('/', 'AdminController@orders')->name('orders'); 
    Route::get('/book/{id}', 'AdminController@order_book')->name('order.book'); 
    
    Route::get('/view/{id}','OrderController@view')->name('order.view');
    
});

Route::group(['prefix'=>'books'],function(){
    Route::get('/', 'AdminController@books')->name('books');
    Route::post('/add', 'BooksController@add')->name('books.add');
    Route::get('/delete/{id}', 'BooksController@delete')->name('books.delete');
    Route::get('/restore/{id}', 'BooksController@restore')->name('books.restore');
    Route::get('/edit/{id}', 'BooksController@edit')->name('books.edit');
    Route::post('/update/', 'BooksController@update')->name('books.update');
});

