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

Route::middleware(['auth'])->group(function(){
    Route::prefix('lojista')->group(function(){
        Route::get('/lojas/{loja}/editar', ['uses' => 'StoreController@edit', 'as' => 'lojas.edit']);
        Route::get('/lojas/criar', ['uses' => 'StoreController@create', 'as' => 'lojas.create']);
        Route::resource('lojas', 'StoreController', ['except' => ['edit', 'create', 'show']]);
        
        Route::get('/produtos/{produto}/editar', ['uses' => 'ProductController@edit', 'as' => 'produtos.edit']);
        Route::get('/produtos/criar', ['uses' => 'ProductController@create', 'as' => 'produtos.create']);        
        Route::resource('produtos', 'ProductController', ['except' => ['edit', 'create']]);
        
        Route::resource('tags', 'TagController', ['only' => ['store', 'index', 'destroy']]); 
        
        Route::get('/', 'PagesController@getLojista')->name('lojista.index');
    });
});
Route::get('/buscar', 'PagesController@getSearch')->name('buscar');
Route::get('/loja/{id}', 'PagesController@showLoja')->name('lojas.show');
//Route::get('/anuncios', 'PagesController@getAnuncio')->name('anuncios.index');
Route::get('/anuncios/{slug}', 'PagesController@showAnuncio')->name('anuncios.show');
Route::get('/', 'PagesController@getIndex')->name('home');

Auth::routes();
