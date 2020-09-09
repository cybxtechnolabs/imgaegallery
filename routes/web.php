<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/link/{slug?}', 'HomeController@link');
Route::get('/gallery', 'GalleryController@index');


Route::get('/gallery/index', 'GalleryController@index')->name('gallery.index');
Route::get('/gallery/create', 'GalleryController@create')->name('gallery.create');
Route::post('/gallery/store', 'GalleryController@store')->name('gallery.store');
Route::get('/gallery/edit/{id}', 'GalleryController@edit')->name('gallery.edit');
Route::post('/gallery/update/{id}', 'GalleryController@update')->name('gallery.update');
Route::get('/gallery/delete/{id}', 'GalleryController@destroy')->name('gallery.destroy');

Route::get('/gallery/show', 'GalleryController@show')->name('gallery.show');

Route::get('/gallery/{id}', 'ImageController@index')->name('images.index');
Route::get('/images/create/{gallery_id}', 'ImageController@create')->name('image.create');
Route::post('/images/upload', 'ImageController@upload')->name('images.upload');
Route::post('/image/delete', 'ImageController@destroy')->name('image.delete');