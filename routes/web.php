<?php

use Illuminate\Support\Facades\Route;

Route::get('/albumsdata', 'App\Http\Controllers\AlbumsController@imagenesAlbumGetGuestData');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/dataDevice','App\Http\Controllers\AdminController@dispositivoAdmin');

Route::get('/', 'App\Http\Controllers\AdminController@home');

Route::get('/individuales', 'App\Http\Controllers\ImagenesController@galeriaIndividuales');
Route::get('/individuales/data', 'App\Http\Controllers\ImagenesController@getIndividualesGaleriaData');


Route::get('/historias', 'App\Http\Controllers\AlbumsController@getAlbumsGaleria');
Route::get('/historias/data', 'App\Http\Controllers\AlbumsController@getAlbumsGaleriaData');
Route::get('/historias/{id}', 'App\Http\Controllers\AlbumsController@imagenesAlbumGetGuest');

Route::get('/proyectos', 'App\Http\Controllers\AlbumsController@getAlbumsGaleria');
Route::get('/proyectos/data', 'App\Http\Controllers\AlbumsController@getAlbumsGaleriaData');
Route::get('/proyectos/{id}', 'App\Http\Controllers\AlbumsController@imagenesAlbumGetGuest');

Route::get('/viajes', 'App\Http\Controllers\AlbumsController@getAlbumsGaleria');
Route::get('/viajes/data', 'App\Http\Controllers\AlbumsController@getAlbumsGaleriaData');
Route::get('/viajes/{id}', 'App\Http\Controllers\AlbumsController@imagenesAlbumGetGuest');

Route::get('/sobremi', 'App\Http\Controllers\AdminController@sobremi');

Route::get('/contacto', 'App\Http\Controllers\AdminController@contacto');
Route::post('/contacto','App\Http\Controllers\ContactMail@sendEmail');



/*
Route::get('/adminlogin', function (){
	return Inertia\Inertia::render('login');
});*/


/*				RUTAS PROTEGIDAS ADMIN				*/

Route::middleware(['auth:sanctum', 'verified'])->get('/adminProfile','App\Http\Controllers\AdminController@data');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function (){
	return Inertia\Inertia::render('administrador');
});


/*					RUTAS CONFIGURACIONES			*/

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/configuraciones','App\Http\Controllers\AdminController@configuracion')->name('config.id');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/configuraciones','App\Http\Controllers\AdminController@update');



/*Route::middleware(['auth:sanctum', 'verified'])->get('/admin/estadisticas', function (){
	return Inertia\Inertia::render('adminPaginas/Estadisticas');
});*/

/*Route::middleware(['auth:sanctum', 'verified'])->get('/admin/ventas', function (){
	return Inertia\Inertia::render('adminPaginas/Ventas');
});*/

/*					RUTAS INDIVIDUALES			*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/individuales','App\Http\Controllers\ImagenesController@index');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/individuales','App\Http\Controllers\ImagenesController@storeIndividual');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/individuales/data','App\Http\Controllers\ImagenesController@indexData');


/*					RUTAS HISTORIAS			*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/historias','App\Http\Controllers\AlbumsController@index');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/historias','App\Http\Controllers\AlbumsController@store');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/historias/data','App\Http\Controllers\AlbumsController@AlbumGetdata');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/historias/{id}','App\Http\Controllers\ImagenesController@imagenesAlbumGet');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/historias/{id}','App\Http\Controllers\ImagenesController@storeAlbums');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/historias/{id}/data','App\Http\Controllers\ImagenesController@imagenesAlbumGetdata');


/*					RUTAS PROYECTOS			*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/proyectos','App\Http\Controllers\AlbumsController@index');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/proyectos','App\Http\Controllers\AlbumsController@store');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/proyectos/data','App\Http\Controllers\AlbumsController@AlbumGetdata');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/proyectos/{id}','App\Http\Controllers\ImagenesController@imagenesAlbumGet');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/proyectos/{id}','App\Http\Controllers\ImagenesController@storeAlbums');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/proyectos/{id}/data','App\Http\Controllers\ImagenesController@imagenesAlbumGetdata');


/*					RUTAS VIAJES			*/
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/viajes','App\Http\Controllers\AlbumsController@index');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/viajes','App\Http\Controllers\AlbumsController@store');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/viajes/data','App\Http\Controllers\AlbumsController@AlbumGetdata');

Route::middleware(['auth:sanctum', 'verified'])->get('/admin/viajes/{id}','App\Http\Controllers\ImagenesController@imagenesAlbumGet');
Route::middleware(['auth:sanctum', 'verified'])->post('/admin/viajes/{id}','App\Http\Controllers\ImagenesController@storeAlbums');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin/viajes/{id}/data','App\Http\Controllers\ImagenesController@imagenesAlbumGetdata');


/*					RUTAS ELIMINACION			*/
Route::middleware(['auth:sanctum', 'verified'])->post('/album/delete','App\Http\Controllers\AlbumsController@destroy');
Route::middleware(['auth:sanctum', 'verified'])->post('/imagen/delete','App\Http\Controllers\ImagenesController@destroy');


/*					RUTAS MODIFICACION			*/
Route::middleware(['auth:sanctum', 'verified'])->post('/album/modificar','App\Http\Controllers\AlbumsController@edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/imagen/modificar','App\Http\Controllers\ImagenesController@edit');


/*					RUTAS FUENTES 				*/
Route::middleware(['auth:sanctum', 'verified'])->post('/subirFuente','App\Http\Controllers\AdminController@subirFuente');
Route::middleware(['auth:sanctum', 'verified'])->post('/borrarFuente','App\Http\Controllers\AdminController@borrarFuente');
Route::post('/bajarFuentes','App\Http\Controllers\AdminController@bajarFuentes'); //sin proteccion auth
