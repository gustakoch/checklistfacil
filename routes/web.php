<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'version' => '1.0.0',
        'status' => 200,
        'about' => 'RESTApi to register Cakes. PHP Dev Code Test for Checklistfacil.com'
    ]);
});
