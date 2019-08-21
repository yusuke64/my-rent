<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['cors']], function(){

    Route::get('/all-rent', 'RentController@get_all_rent');

    Route::get('/detail', 'RentController@get_detail');

    Route::options('/register-rent', function(){return 'option';});
    Route::post('/register-rent', 'RentController@register_rent');

    Route::options('/delete-rent', function(){return 'option';});
    Route::delete('/delete-rent', 'RentController@delete_rent');

    Route::options('/edit-rent', function(){return 'option';});
    Route::post('/edit-rent', 'RentController@edit_rent');
});