<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('success_checkout', function () {
    return view('success_checkout');
})->name('success_checkout');

