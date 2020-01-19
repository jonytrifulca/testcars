<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Coche;

/*Route::get('/', function () {

    $coche = new Coche();
    $coche->modelo = "modeloX";
    $coche->potencia = -4;
    $coche->marca_id = 1;
    //$coche->save();


   // $this->assertTrue($coche->potencia == 4);
});*/

Route::get('/', 'CochesController@index');

Route::resource('coches', 'CochesController');
Route::resource('marcas', 'MarcasController');

Route::get('/test', function () {

    return Coche::with('marca')->get();
    //return json_decode(file_get_contents("coches.json"), true);
});
