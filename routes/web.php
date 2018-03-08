<?php

Route::get('/',function () {

	return view('welcomeHere');
});

Route::get('sale',function () {

	return view('saleForm');
});

Route::get('sale','salesController@sale');
Route::get('submitSale','salesController@submitSale');
// post won't work on my computer, i don't know why.. - error about: Upgrade-Insecure-Requests:1
// - so i use GET

