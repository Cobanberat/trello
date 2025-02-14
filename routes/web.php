<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app', ['name' => view('sidebar'), 'container' => view('container')]);
});

