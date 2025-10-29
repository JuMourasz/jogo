<?php

use Illuminate\Support\Facades\Route;

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/historia', function () {
    return view('historia');
})->name('historia');

Route::get('/introfase1', function () {
    return view('introfase1');
})->name('introfase1');

Route::get('/fase1', function () {
    return view('fase1');
})->name('fase1');

Route::get('/introfase2', function () {
    return view('introfase2');
})->name('introfase2');

Route::get('/fase_2', function () {
    return view('fase_2');
})->name('fase_2');

Route::get('/introfase3', function () {
    return view('introfase3');
})->name('introfase3');

Route::get('/fase3', function () {
    return view('fase3');
})->name('fase3');

Route::get('/introfase4', function () {
    return view('introfase4');
})->name('introfase4');

Route::get('/fase4', function () {
    return view('fase4');
})->name('fase4');

Route::get('/fim', function () {
    return view('fim');
})->name('fim');

