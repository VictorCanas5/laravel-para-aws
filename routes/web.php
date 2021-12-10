<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use GuzzleHttp\Client;
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
Route::get('/prueba', function() 
{

$client = new Client([

                    'base_uri'=> 'https://jsonplaceholder.typicode.com',
                    'timeout'=> 2.0,
    ]);
    
    $response = $client->request('GET','posts');

    return json_decode($response->getBody()->getContents());

   // return view('welcome');

 } );

    


