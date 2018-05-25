<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/customers', 'CustomersController@search');
Route::get('/api/products', 'ProductsController@search');

Route::resource('/api/invoices', 'InvoicesController');