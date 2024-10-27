<?php

namespace App\Classes;


use DB;
use Storage;


class System{
    public $base;
	
    function __construct(){
          // $this->base = new mysqli("localhost", "root", "", "android_conmebol");
          
          // if ($this->base->connect_errno) {
          //     echo "Error de conexion a DB: Error " . $this->base->connect_errno . " - " . $this->base->connect_error;
          // }else{
          //   $this->base->query('SET CHARACTER SET UTF8');
          // }
    }

    public function borrar($tabla){
      
      try{
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('DROP TABLE '.$tabla);
        $result = DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::commit();
        return $result;
      }catch(Exception $e){
        DB::rollback();
        return false;
      }
    }

    
    public function copyTabla($tabla){
      
      $nueva = 'back_'.$tabla;

      try{
        DB::beginTransaction();
        
        $result = DB::statement('CREATE TABLE '.$nueva .' LIKE '.$tabla);
        DB::commit();
        return $result;
      }catch(Exception $e){
        DB::rollback();
        return false;
      }
      
     
      
    }

    public function setBackup($tabla){
      try{
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        if(!$this->borrar('back_'.$tabla)){
          return false;
        }
        DB::statement('CREATE TABLE '.'back_'.$tabla .' LIKE '.$tabla);
        DB::statement('INSERT INTO back_'.$tabla.' SELECT * FROM '.$tabla);
        $result = DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::commit();
        return $result;
      }catch(Exception $e){
        DB::rollback();
        return false;
      }
    }

    public function getBackup($tabla){
      try{
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        if(!$this->borrar($tabla)){
          return false;
        }
        DB::statement('CREATE TABLE '.$tabla .' LIKE '.'back_'.$tabla);
        DB::statement('INSERT INTO '.$tabla.' SELECT * FROM back_'.$tabla);
        $result = DB::statement('SET FOREIGN_KEY_CHECKS=1');
        DB::commit();
        return $result;
      }catch(Exception $e){
        DB::rollback();
        return false;
      }
    }


    public function modTabla($tabla){
      
      "DROP TABLE back_".$tabla;
      //copyTabla($tabla, $base);
      
    }
	

    public function emptyTable($table){
      try{
        DB::beginTransaction();
        DB::table($table)->delete();
        DB::commit();
        return true;
      }catch(Exception $e){
        DB::rollback();
        return false;
      }
    }

}