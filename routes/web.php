<?php

use App\Events\{
    FormSubmitted,NodeSubmitted
};
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/senduser', function(){
    $user = User::inRandomOrder()->first();
    event(new NodeSubmitted($user));

});

Route::post('/sender', function(){
    $text = request()->text;
    event(new FormSubmitted($text));
});

Route::get('/sender', function(){
    return view('sender');
});

Route::get('/pusher', function(){
    return view('pusher');
});

Route::get('/', function () {
    return view('welcome');
});
