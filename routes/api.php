<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Models\Historial;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Usuarios
Route::get('/usuarios','App\Http\Controllers\UsuariosController@index');
Route::post('/usuarios','App\Http\Controllers\UsuariosController@store');
Route::post('/usuarios/{id}','App\Http\Controllers\UsuariosController@update');
Route::delete('/usuarios/{id}','App\Http\Controllers\UsuariosController@destroy');
//Sensor
Route::get('/sensor','App\Http\Controllers\SensorController@index');
Route::post('/sensor','App\Http\Controllers\SensorController@store');
Route::post('/sensor/{id}','App\Http\Controllers\SensorController@update');
Route::delete('/sensor/{id}','App\Http\Controllers\SensorController@destroy');

//Historial
Route::get('/historial','App\Http\Controllers\HistorialController@index');
Route::post('/historial','App\Http\Controllers\HistorialController@store');
Route::post('/historial/{id}','App\Http\Controllers\HistorialController@update');
Route::delete('/historial/{id}','App\Http\Controllers\HistorialController@destroy');

//Soporte
Route::get('/soporte','App\Http\Controllers\SoporteController@index');
Route::post('/soporte','App\Http\Controllers\SoporteController@store');
Route::post('/soporte/{id}','App\Http\Controllers\SoporteController@update');
Route::delete('/soporte/{id}','App\Http\Controllers\SoporteController@destroy');

Route::post('register', 'App\Http\Controllers\UsuariosController@register');
Route::post('login', 'App\Http\Controllers\UsuariosController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UsuariosController@getAuthenticatedUser');

});

Route::get('/mov', function() 
{

   $response = Http::withHeaders([
    'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
    
])->get('https://io.adafruit.com/api/v2/joseissac/feeds/movimiento/data');


    return json_decode($response->getBody()->getContents());


 } );
Route::post('/subirtemp','App\Http\Controllers\GuzzleController@InsertTemp');
Route::post('/subirmov','App\Http\Controllers\GuzzleController@InsertMov');
Route::post('/subirdist','App\Http\Controllers\GuzzleController@InsertDist');
Route::post('/subirhume','App\Http\Controllers\GuzzleController@InsertHume');

Route::get('/temp', function() 
{

   $response = Http::withHeaders([
    'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
    
])->get('https://io.adafruit.com/api/v2/joseissac/feeds/temperatura/data?limit=1/next');


    return json_decode($response->getBody()->getContents());


 } );
Route::get('/dist', function() 
{

   $response = Http::withHeaders([
    'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
    
])->get('https://io.adafruit.com/api/v2/joseissac/feeds/distancia/data');


   return json_decode($response->getBody()->getContents());


 } );




