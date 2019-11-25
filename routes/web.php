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




Route::get('/book/{id}', 'GetBookController@index')->name('get-book');
Route::get('/book/download/{id}', 'GetBookController@downloadBook')->name('download-book');
Route::get('/book/open/{id}', 'GetBookController@openBook')->name('open-book');


Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('/user/template', function(){
    return Response::download(public_path().'/files/CreateUserTemplate.xlsx','CreateUserTemplate1.xlsx');
})->name('excelTemplate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user', 'UsersController');
Route::get('/user/{id}/editProfile', 'UsersController@editProfile')->name('edit-profile');
Route::get('/user/{id}/changePassword', 'UsersController@changePassword')->name('changePassword');
Route::put('/user/changePassword/{id}', 'UsersController@pwdChange')->name('pwdChange');
Route::resource('/manager/books', 'BookController');
Route::get('/category-group/{id}', 'BookController@requestGroup');
Route::get('/group-books/{id}', 'HomeController@requestBooks');
Route::resource('/manager/category', 'CategoryController');
Route::resource('/manager/group', 'GroupController');

Route::resource('/book/review', 'ReviewsController');
Route::get('/book/comments/{book_id}', 'ReviewsController@comments')->name('comment');