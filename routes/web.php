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

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', "MainController@actionIndex")->name("main");
Route::get('/about', "MainController@actionAbout")->name("about");
Route::get('/admin', "MainController@actionAdmin")->middleware("admin")->name("admin");
Route::get('/profile/{name}', "MainController@actionProfile")->name("profile");
Route::get('/mail',"MainController@actionMail")->name('mail');

/*Route::get('/mail',function (){
    $user = ['name'=>'Ivan'];
    return new OrderShipped($user);
})->name('mail');*/


Route::post("/addpost","MainController@actionAddPost")->name("addpost");
Route::delete("/delpost/{postid}","MainController@actionDelPost")->name("delpost");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
