<?php
Route::get('/', function () {
	return redirect('location');
});
Route::get('/', 'ShopController@location')->name('location');
Route::get('shop/search/{lat}/{lng}', 'ShopController@search')->name('search');
Route::get('shop/shops_register', 'ShopController@shopsRegister');
Route::post('shop/shops_register', 'ShopController@shopsRegister')->name('shop_register');
Route::get('shop/result', 'ShopController@result')->name('result');
Route::get('shop/detail/{shop_id}', 'ShopController@detail')->name('detail');
Route::get('shop/map/{shop_lat}/{shop_lng}', 'ShopController@map')->name('map');
