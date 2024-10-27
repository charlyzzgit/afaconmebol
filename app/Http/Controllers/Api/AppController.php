<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\System;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Log;
use getID3;
use App\Models\Linea;
use App\Models\Zona;



class AppController extends Controller
{
   public function onLine(){
      
   }

   public function apiRegister(Request $request){
     return processTransaction(function() use($request){
       $user = User::create([
            'name' => $request->user,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
       $token = $user->createToken('auth_token')->plainTextToken;
       if($request->demo){
         $this->updateApiToken($user->id, $token);
       }

      return ['token' => $token];
     }, 'Register Success', 'Error al Registrarse: ');
   }

   public function updateApiToken($user_id, $token){
      return processTransaction(function() use($user_id, $token){
          $user = User::find($user_id);
          $user->api_token = $token;
          $user->save();
      }, 'Token ok', 'Token error');
   }
   

   public function apiLogin(Request $request){
  
       
       if(Auth::attempt(['name' => request('user'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $token =  $user->createToken('auth_token')->plainTextToken; 
            $this->updateApiToken($user->id, $token);
            return response()->json(['result' => 'OK', 'token' => $token]); 
        }
        return response()->json(['result' => 'ERROR', 'message' => 'El usuario no existe']); 
    }

    public function apiLogout(Request $request){
        return processTransaction(function() use ($request){
          $user = User::find($request->user_id);
          $user->api_token = null;
          $user->save();

        }, 'Logout OK', 'Error al cerrar Sesión: ');
    }

    public function getUser(Request $request){
      $user = User::where('api_token', $request->api_token)->first();
      return response()->json([
              'result' => $user ? 'OK' : 'ERROR',
              'user' => $user ? $user : null
          ]);
    }


    


    public function getLineas(Request $request){
      return response()->json(Linea::get());
    }

    public function getLine(Request $request){
      //dd($request->all());
      $linea = Linea::with('ramales.routes')->find($request->id);
      return response()->json($linea);
    }


    public function getZonas(Request $request){
      return response()->json(Zona::with('partidos.barrios')->get());
    }

    
   
   
}
