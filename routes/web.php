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
Route::get('/carts', 'CartController@index')->name('carts');
Route::post('/carts/add', 'CartController@add')->name('carts.add');


Route::get('page/books/view/{id}','BooksController@front_view')->name('pages.books.view');

Route::group(['prefix'=>'books'],function(){
    Route::post('/add', 'BooksController@add')->name('books.add');
    Route::get('/delete/{id}', 'BooksController@delete')->name('books.delete');
    Route::get('/edit/{id}', 'BooksController@edit')->name('books.edit');
    Route::post('/update/', 'BooksController@update')->name('books.update');
});

