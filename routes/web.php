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

Route::get('/',['as'=>'admin.index', 'uses'=>'HomeController@index']);
Route::get('/absensi',['as'=>'absensi', 'uses'=>'AbsensiController@index']);
Route::post('/absensi/{type}',['as'=>'absensi.post', 'uses'=>'AbsensiController@postAbsensi']);
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::group(['prefix'=>'master'], function(){
        Route::group(['prefix'=>'jabatan'], function(){
            Route::get('/','Admin\JabatanController@index');
            Route::post('/add','Admin\JabatanController@add');
            Route::post('/edit','Admin\JabatanController@edit');
        });
        Route::group(['prefix'=>'pegawai'], function(){
            Route::get('/','Admin\PegawaiController@index');
            Route::get('/add','Admin\PegawaiController@add');
            Route::post('/add','Admin\PegawaiController@postAdd');
            Route::get('/edit/{pegawai_id}','Admin\PegawaiController@edit');
            Route::post('/edit/{pegawai_id}','Admin\PegawaiController@postEdit');
        });
        Route::get('/edit/{shop_id}','Admin\ShopController@edit');
        Route::post('/edit/{shop_id}','Admin\ShopController@postEdit');
        Route::get('/delete/{credit_id}','Admin\ShopController@delete');
        Route::get('/detail/{credit_id}','Admin\ShopController@detail');
        Route::get('/export/{credit_id}','Admin\ShopController@export');
    });

    Route::group(['prefix'=>'history-absensi'], function(){
        Route::get('/','Admin\HistoryController@index');
        Route::get('/search','Admin\HistoryController@search');
    });

    Route::group(['prefix'=>'tasks'], function(){
        Route::get('/','Admin\TaskController@index');
        Route::get('/search','Admin\HistoryController@search');
    });

    Route::group(['prefix'=>'export'], function(){
        Route::get('/','Admin\DataController@indexExport');
        Route::get('/{credit_id}','Admin\DataController@export');
    });
});