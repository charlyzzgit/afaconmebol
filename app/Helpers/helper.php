<?php 



function str_replace_array($search, array $replace, $subject)
{
    if (0 === $tokenc = substr_count(strtolower($subject), strtolower($search))) {
        return $subject;
    }

    $string  = '';
    if (count($replace) >= $tokenc) {
        $replace = array_slice($replace, 0, $tokenc);
        $tokenc += 1; 
    } else {
        $tokenc = count($replace) + 1;
    }
    foreach(preg_split('/'.preg_quote($search, '/').'/i', $subject, $tokenc) as $part) {
        $string .= $part.array_shift($replace);
    }

    return $string;
}

function sql($query, $dump = null){
   if(!$query){
      dd('Algo salió mal, revisar el parametro de consulta');
   }
   $bindings = [];
   foreach($query->getBindings() as $b){
      $bindings[] = "'".$b."'";
   }
   if($dump){
      dump(str_replace_array('?', $bindings, $query->toSql()));
   }else{
      dd(str_replace_array('?', $bindings, $query->toSql()));
   }

}

function randomDate($formato, $limiteInferior, $limiteSuperior){
      // Convertimos la fecha como cadena a milisegundos
      $milisegundosLimiteInferior = strtotime($limiteInferior);
      $milisegundosLimiteSuperior = strtotime($limiteSuperior);
      if($milisegundosLimiteInferior > $milisegundosLimiteSuperior){
        return date($formato, $milisegundosLimiteInferior);
      }
      // Buscamos un número aleatorio entre esas dos fechas
      $milisegundosAleatorios = mt_rand($milisegundosLimiteInferior, $milisegundosLimiteSuperior);

      // Regresamos la fecha con el formato especificado y los milisegundos aleatorios
        return date($formato, $milisegundosAleatorios);
    }

function setCerosMax($string, $length){
  return str_pad($string, $length, "0", STR_PAD_LEFT);
}


function getResponse($status, $message, $data = null){
   $response = [
      'result' => $status ? 'OK' : 'ERROR',
      'message' => $message
   ];
   if($data){
      $response['data'] = $data;
   }
   return response()->json($response);
}

function getUrlFile($file, $source, $extension = null){
  $ext = $extension ? $extension : 'png';
  $filename = $source.'.'.$ext;
  $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $file));
  $result = Storage::disk('public')->put($filename, $data);
  return $filename;
}

function processTransaction($callback, $success, $error){
   try{
      \DB::beginTransaction();
      $data = $callback();
      \DB::commit();
      return getResponse(true, $success, $data);
   }catch(Exception $e){
      \DB::rollback();
      //dd($e);
      Illuminate\Support\Facades\Log::channel('app')->info($e);
      return getResponse(false, $error.' '.getException($e));
   }
   
}

function getException($e){
  $line = $e->getLine(); // Obtener el número de línea
  $message = $e->getMessage(); // Obtener el mensaje de la excepción
  $file = $e->getFile();
  $info = []; 
  $info[] = 'Error: '.$message;
  $info[] = 'Archivo: '.$file;
  $info[] = 'Linea: '.$line;
  return implode("\n", $info);
  
}

function getUrlImage($file,  $source){
  $date = \Carbon\Carbon::now()->format('d-m-Y');
  $time = \Carbon\Carbon::now()->format('H:i:s');
  $prefix = $date.'-'.$time;
  $filename = $source.'-'.$prefix.'.'.$file->getClientOriginalExtension();
  $result = Storage::disk('public')->put($filename, $file->get());
   return $filename; //URL::to('/s3-imagenes').$filename;
}

function deleteFile($url){
  Storage::disk('public')->delete($url);
}

function getQueryTable($rows, $request, $mapeo = null){
   $count=$rows->count();
   $rows = $rows->skip($request->offset)->limit($count)->take($request->limit)->get();
   if($mapeo){
    $rows = $rows->map(function($q) use ($mapeo){
      return $mapeo($q);
    });
   }
   return response()->json(array(
      'total'=>$count,
      'rows'=>$rows
   ));
}

function refreshCache(){
   $params = [
      rand(0,9),
      rand(0,9),
      rand(0,9),
      rand(0,9),
      rand(0,9)
   ];
   return '?'.implode('.', $params);
}

function fileNameFormat($name){
  $src = str_replace(['', 'á', 'é', 'í', 'ó', 'ú'], ['_', 'a', 'e', 'i', 'o', 'u'], $name);
  
  return preg_replace( '/[\r\n\t -]+/', '-', $src);
}

function validar($request, $params){
    
    $v = Illuminate\Support\Facades\Validator::make($request->all(), $params);

   $errors = [];
   if($v->fails()){
      $m = (array) json_decode($v->messages(), false);
      
      foreach (array_keys($m) as $i => $value){
         $items = [];
         foreach($m[$value] as $item){
            $items[] = $item;
         }
         $errors[] = [
            'field' => $value,
            'items' => $items
          ];
      }
   }
   return $errors;
}

function cutAppostrof($str){
  $pattern = "/'/i";
  return preg_replace($pattern, '', $str);
}


function getName($name){
  return str_replace(' ', '_', cutAppostrof($name));
}

function getEquipoDirectory($src){
  $parts = explode('/', $src);
  return $parts[0].'/'.$parts[1];
}

function deleteDir($path){
  if (\File::exists($path)){
   \File::deleteDirectory($path);
 }
}


function randomGenerator($count, $lib = null){
  $fin = false;
  $gps = [];
  while(!$fin){
    $gps = [];
    for($g = 0; $g < $count; $g++){
      $gps[] = rand(0, $count - 1);
    }
    if(count(array_unique($gps)) == $count){
      
        $fin = true;
      
    }
  }
  return $lib ? randomLib($gps) : $gps;
}


function alert($value){
  print($value."\n");
}

function upper($text){
  return strtoupper($text);
}




function getMerge($array){
  $merge = [];
  foreach($array as $a){
    foreach($a as $e){
      $merge[] = $e;
    }
  }
  
  return $merge;
}

function getDesdeHasta($array, $d, $h){
  $result = [];
  for($i = $d; $i < $h; $i++){
    $result[] = $array[$i];
  }
  return $result;
}

function ocurrencias($array, $value){
  $count = 0;
  foreach($array as $el){
    if($el == $value){
      $count++;
    }
  }
  return $count;
}

function optionsSort(&$options){
  $ls = count($options) - 1;
  while($ls > 0){
    for($i = 0; $i < $ls; $i++){
      $a = $options[$i];
      $b = $options[$i + 1];
      if(isset($a['name'])){
        if($a['name'] > $b['name']){
          $options[$i] = $b;
          $options[$i + 1] = $a;
        }
      }else{
        if($a > $b){
          $options[$i] = $b;
          $options[$i + 1] = $a;
        }
      }
    }
    $ls--;
  }
}




function CURL($url, $method, $post_fields = null){
    
    $curl = curl_init();

    

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_ENCODING, '');
    curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 0);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($curl);

    $curlInfo = curl_getinfo($curl);

  
    

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    $err = curl_error($curl);

    

    curl_close($curl);
    
    return [
        'response' => $response,
        'error'  => $err,
        'status' => $status
    ];
  }


function toObject(&$e){
  $e = (object) $e;
}




function objectToArray($obj) {
    return get_object_vars($obj);
}

function getFondos(){
  $directory = public_path('resources/fondos');
        
        // Obtener todas las imágenes del directorio
  $images = glob($directory . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
        
        // Obtener solo los nombres de los archivos, no la ruta completa
  return array_map('basename', $images);
  
}

function getRandomFondo(){
  $fondos = getFondos();
  return $fondos[rand(0, count($fondos) - 1)];
}

function getColors(){
  $colors = \DB::Table('colores')->get();
  return $colors;
}

function getEquipoIdByName($name){
  $eq = \App\Models\Equipo::where('name', $name)->first();
  return $eq ? $eq->id : null;
}

function getData(){
 
  return json_encode((new \App\Classes\Admin())->getData());
}


function isCampeon($id, $copa, $zona = null){
  $main = getMain();
  switch($copa){
    case 'afa':
      if($zona){
        switch($zona){
          case 'B': return $main->afa_b == $id ? true : false;
          case 'C': return $main->afa_c == $id ? true : false;
          default: return $main->afa_a == $id ? true : false;
        }
      }
      return $main->afa_a == $id ? true : false;
    case 'argentina': return $main->arg == $id ? true : false;
    case 'recopa': return $main->rec == $id ? true : false;
    case 'sudamericana': return $main->sud == $id ? true : false;
    case 'libertadores': return $main->lib == $id ? true : false;
    default: return false;
  }
}

function getPlazas($copa){
  $copas = config('copas');
  foreach($copas as $c){
    if($c['copa'] == $copa){
      return $c['plazas'];
    }
  }
  return null;
}

function getCopa($copa){
  $copas = config('copas');
  foreach($copas as $c){
    if($c['copa'] == $copa){
      return $c;
    }
  }
  return null;
}

function getClasificadosAfa(){
  return [
              'lib' => \App\Models\CupoAfa::where('copa', 'libertadores')->orderBy('pos')->get(),
              'sud' => \App\Models\CupoAfa::where('copa', 'sudamericana')->orderBy('pos')->get()
            ];
  

}

function getMain(){
  return \App\Models\Main::first();
}

