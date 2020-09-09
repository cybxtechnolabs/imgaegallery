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

Route::get('logout', function(){ Auth::logout();    return Redirect::to('/'); });

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'admin'], function () {
    
    /* My Page */
    Route::get('/',                      'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('dashboard/index',                      'Admin\DashboardController@index')->name('admin.dashboard.index');


    /* users */
    Route::get('/users',                   	'Admin\UsersController@index')->name('admin.users.index');
    Route::get('/users/create',               'Admin\UsersController@create')->name('admin.users.create');
    Route::post('/users/save',                'Admin\UsersController@store')->name('admin.users.store');
    Route::get('/users/edit/{id}',            'Admin\UsersController@edit')->name('admin.users.edit');
    Route::post('/users/update',              'Admin\UsersController@update')->name('admin.users.update');
    Route::get('/users/delete/{id}',          'Admin\UsersController@destroy')->name('admin.users.delete');
    Route::post('/users/getTableData',        'Admin\UsersController@getTableData')->name('admin.users.getTableData');

    Route::get('/profiles', 'Admin\ProfilesController@index')->name('admin.profiles');
    Route::post('/profiles/update', 'Admin\ProfilesController@update')->name('admin.profiles.update');

    /* users */
    Route::get('/gallery',                   	'Admin\GalleryController@index')->name('admin.gallery.index');
    Route::get('/gallery/show/{id}',            'Admin\GalleryController@show')->name('admin.gallery.show');
    Route::get('/gallery/delete/{id}',          'Admin\GalleryController@destroy')->name('admin.gallery.delete');
    Route::get('/image/delete/{id}',          'Admin\GalleryController@imageDestroy')->name('admin.image.delete');
});
