<?php 
use App\Models\Color;


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
      dd($e);
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

function copaZona($str, $index){
  $p = explode('-', $str);
  return isset($p[$index]) ? $p[$index] : null;
}

function colorGrupo($gp){
      switch($gp){
        case 1: return [ 'a' => Color::where('name', 'rojo')->first(), 'b' => Color::where('name', 'naranja')->first()];
        case 2: return [ 'a' => Color::where('name', 'azul')->first(), 'b' => Color::where('name', 'celeste')->first()];
        case 3: return [ 'a' => Color::where('name', 'verde')->first(), 'b' => Color::where('name', 'verdeclaro')->first()];
        case 4: return [ 'a' => Color::where('name', 'amarillo')->first(), 'b' => Color::where('name', 'crema')->first()];
        case 5: return [ 'a' => Color::where('name', 'naranja')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 6: return [ 'a' => Color::where('name', 'celeste')->first(), 'b' => Color::where('name', 'cielo')->first()];
        case 7: return [ 'a' => Color::where('name', 'verdeclaro')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 8: return [ 'a' => Color::where('name', 'crema')->first(), 'b' => Color::where('name', 'marronclaro')->first()];
        case 9: return [ 'a' => Color::where('name', 'bordo')->first(), 'b' => Color::where('name', 'rojo')->first()];
        case 10: return [ 'a' => Color::where('name', 'azuloscuro')->first(), 'b' => Color::where('name', 'azul')->first()];
        case 11: return [ 'a' => Color::where('name', 'verdeoscuro')->first(), 'b' => Color::where('name', 'verde')->first()];
        case 12: return [ 'a' => Color::where('name', 'marronclaro')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 13: return [ 'a' => Color::where('name', 'grana')->first(), 'b' => Color::where('name', 'rosa')->first()];
        case 14: return [ 'a' => Color::where('name', 'violeta')->first(), 'b' => Color::where('name', 'rosa')->first()];
        case 15: return [ 'a' => Color::where('name', 'turquesa')->first(), 'b' => Color::where('name', 'celeste')->first()];
        case 16: return [ 'a' => Color::where('name', 'marron')->first(), 'b' => Color::where('name', 'marronclaro')->first()];
        case 100: return ['a' => Color::where('name', 'negro')->first(), 'b' => Color::where('name', 'gris')->first()];
        default: return ['a' => Color::where('name', 'blanco')->first(), 'b' => Color::where('name', 'gris')->first()];
      }
}

function isInternacional($copa){
  $copas = ['sudamericana', 'libertadores'];
  return in_array($copa, $copas);
}


function getNivelCopa($liga_id){
  switch($liga_id){
    case 1: return 10;
    case 2: return 9;
    case 3: return 8;
    case 4: return 7;
    case 5: return 6;
    case 6: return 5;
    case 7: return 4;
    case 8: return 3;
    case 9: return 2;
    default: return 1;
  }
}

function cantGrupos($grupo){
  $count = \App\Models\Grupo::where('anio', $grupo->anio)
                            ->where('copa', $grupo->copa)
                            ->where('fase', $grupo->fase);
  if($grupo->zona){
    $count = $count->where('zona', $grupo->zona);
  }
  //dump('count', $count->count());
  return $count->count();

}

function getBolillero($count){
  $bolillas = [];
  for($i = 0; $i < $count; $i++){
    $bolillas[] = $count + 1;
  }
  return $bolillas;
}

function getDia($grupo){
  $cg = cantGrupos($grupo);
  $gp = $grupo->grupo;
  switch($cg){
    case 1: return 2;
    case 2: return $gp == 1 ? 2 : 3;
    case 4: return ($gp == 2 || $gp == 3) ? 2 : ($gp == 1 ? 1: 3);
    case 8: return $gp < 3 ? 1 : ($gp >= 3 && $gp < 6 ? 2 : 3);
    default: return $gp < 6 ? 1 : ($gp >= 6 && $gp < 12 ? 2 : 3); 
  }
}

function getHora($grupo){
  $cg = cantGrupos($grupo);
  $gp = $grupo->grupo;
  switch($cg){
    case 1: case 2: return 21;
    case 4: return $gp == 2 ? 19 : 21;
    case 8: $v = [1,3,6]; return in_array($gp, $v) ? 19 : 21;
    default: $v = [1,2,6,7,8,12,13]; return in_array($gp, $v) ? 19 : 21;
  }
}

function getDiasAfa($count){
  switch($count){
    case 24: return [
                
                [
                  'dia' => 4,
                  'hora' => 17
                ],
                [
                  'dia' => 4,
                  'hora' => 17
                ],
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 7,
                  'hora' => 17
                ],
                [
                  'dia' => 7,
                  'hora' => 17
                ],
                [
                  'dia' => 7,
                  'hora' => 21
                ],
                [
                  'dia' => 7,
                  'hora' => 21
                ]
                
              ];
    case 20: return [
                
                [
                  'dia' => 4,
                  'hora' => 17
                ],
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 7,
                  'hora' => 17
                ],
                [
                  'dia' => 7,
                  'hora' => 21
                ]
                
              ];
    case 12: return [
                
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 14
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 14
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];

    case 8: return [
                
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];
    case 6: return [
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];

    case 4: return [
                
                [
                  'dia' => 5,
                  'hora' => 17
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 17
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];
    case 3: return [
                [
                  'dia' => 4,
                  'hora' => 21
                ],
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];
    case 2: return [
                
                [
                  'dia' => 5,
                  'hora' => 21
                ],
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];
    default: return [
                [
                  'dia' => 6,
                  'hora' => 21
                ]
              ];
  }
}

function getWeeksDay($d, $h, $count){
  $dh = getDiasAfa($count);
  $result = [];
  foreach($dh as $el){
    if($el['dia'] == $d && $el['hora'] == $h){
      $result[] = $el;
    }
  }
  return $result;
}

function getHorarioAfa($count){
  $jornadas = [];
  switch($count){
    case 24: case 20:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(6, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(4, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(6, 14, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 14, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(7, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(4, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(7, 17, $count));
    break;
    case 12:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(6, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(6, 14, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 14, $count));
    break;
    case 8: case 4:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(6, 17, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 17, $count));
    break;
    case 6: case 3:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(4, 21, $count));
    break;
    case 2:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
      $jornadas = array_merge($jornadas, getWeeksDay(5, 21, $count));
    break;
    default:
      $jornadas = array_merge($jornadas, getWeeksDay(6, 21, $count));
    break;

  }

  return $jornadas;
}

function getNameFase($copa, $fase){
  $copas = config('copas');
  foreach($copas as $c){
    if($c['copa'] == $copa){
      foreach($c['fases'] as $f){
        if($f['fase'] == $fase){
          return $f['text'];
        }
      }
    }
  }
  return null;
}

function getFechaFase($copa, $fase, $fecha){
  if($copa == 'afa'){
    return $fase < 2 ? $fecha.'° FECHA' : ($fecha == 1 ? 'IDA' : 'VUELTA');
  }else{
    return $fase == 0 ? $fecha.'° FECHA' : ($fecha == 1 ? 'IDA' : 'VUELTA');
  }
}