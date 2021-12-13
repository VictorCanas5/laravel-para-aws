<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class GuzzleController extends Controller
{
    public function InsertTemp(Request $request)
    {
         
        $response = Http::withHeaders([
    'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
    
])->get('https://io.adafruit.com/api/v2/joseissac/feeds/temperatura/data?limit=5/last');

 $extraccion= json_decode($response->getBody()->getContents());
    
      foreach ($extraccion as $registro) 
      {
        //insertar temperatura
         $temp=$registro->value;
        $affected = DB::table('historials')
              ->where('tipo', 'temperatura')
              ->update(['valor' => $temp]);  
        //insertar fecha
        $fecha=$registro->created_at;
        $affected2 = DB::table('historials')
              ->where('tipo', 'temperatura')
              ->update(['fecha_y_hora' => $fecha]);  
        //insertar tipo de sensor
        $tipo=$registro->feed_key;
        $affected3 = DB::table('historials')
              ->where('tipo', 'temperatura')
              ->update(['tipo' => $tipo]);
      }
    }

public function InsertMov(Request $request)
      {

            $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
        
    ])->get('https://io.adafruit.com/api/v2/joseissac/feeds/movimiento/data?limit=1/last');

     $extraccion= json_decode($response->getBody()->getContents());
        
          foreach ($extraccion as $registro) 
          {
            //insertar temperatura
             $temp=$registro->value;
            $affected = DB::table('historials')
                  ->where('tipo', 'movimiento')
                  ->update(['valor' => $temp]);  
            //insertar fecha
            $fecha=$registro->created_at;
            $affected2 = DB::table('historials')
                  ->where('tipo', 'movimiento')
                  ->update(['fecha_y_hora' => $fecha]);  
            //insertar tipo de sensor
            $tipo=$registro->feed_key;
            $affected3 = DB::table('historials')
                  ->where('tipo', 'movimiento')
                  ->update(['tipo' => $tipo]);
                  
            }
     }

     public function InsertDist(Request $request)
      {

         $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
        
    ])->get('https://io.adafruit.com/api/v2/joseissac/feeds/distancia/data?limit=1/last');

     $extraccion= json_decode($response->getBody()->getContents());
        
          foreach ($extraccion as $registro) 
          {
            //insertar temperatura
             $temp=$registro->value;
            $affected = DB::table('historials')
                  ->where('tipo', 'distancia')
                  ->update(['valor' => $temp]);  
            //insertar fecha
            $fecha=$registro->created_at;
            $affected2 = DB::table('historials')
                  ->where('tipo', 'distancia')
                  ->update(['fecha_y_hora' => $fecha]);  
            //insertar tipo de sensor
            $tipo=$registro->feed_key;
            $affected3 = DB::table('historials')
                  ->where('tipo', 'distancia')
                  ->update(['tipo' => $tipo]);
                  
            }

      }
      public function InsertHume(Request $request)
      {

         $response = Http::withHeaders([
        'X-AIO-Key' => 'aio_YqXO639XXzwQpzpQYuQGbZV3K56I',
        
    ])->get('https://io.adafruit.com/api/v2/joseissac/feeds/humedad/data?limit=1/last');

     $extraccion= json_decode($response->getBody()->getContents());
        
          foreach ($extraccion as $registro) 
          {
            //insertar temperatura
             $temp=$registro->value;
            $affected = DB::table('historials')
                  ->where('tipo', 'humedad')
                  ->update(['valor' => $temp]);  
            //insertar fecha
            $fecha=$registro->created_at;
            $affected2 = DB::table('historials')
                  ->where('tipo', 'humedad')
                  ->update(['fecha_y_hora' => $fecha]);  
            //insertar tipo de sensor
            $tipo=$registro->feed_key;
            $affected3 = DB::table('historials')
                  ->where('tipo', 'humedad')
                  ->update(['tipo' => $tipo]);
                  
            }

      }
}
