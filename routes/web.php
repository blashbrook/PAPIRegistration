<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
    return view('papiregistration::welcome');
});

Route::get('/cards', function ()
{
    return view('papiregistration::cards');
});
