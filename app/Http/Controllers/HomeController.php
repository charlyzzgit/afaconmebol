<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use DB;
use Carbon\Carbon;
use App\Classes\Admin;
use App\Classes\System;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function onLine(){
      
   }

   

   public function index(){
      $admin = new Admin();
      $data = json_encode($admin->getData());
      return view('layouts.home', compact('data'));
   }

   public function inicio(){
     return view('home.inicio');
   }

   public function system(){
     return view('home.system');
   }

   



}



