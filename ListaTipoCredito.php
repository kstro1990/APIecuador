<?php

/**
 * lista de tipo de credito en Datafast
 *Luis Castro
 *06/12/2019
 */
class Filtro_tipo_Credito
{
  function filtroTest ($credito = [])
  {
// inicialización de Objetos
    $Datafast = new stdClass();
    $filtro = new stdClass();
    $installments = new stdClass();
    $code = new stdClass();
    $groupCode = new stdClass();
    $type = new stdClass();
    $array = [];
// inicialización de variables
    $code='';
    $groupCode='';
    $type='';
    $index = 0;

    foreach ($credito as $clave => $valor) {
          $installments=[];
          // valos de los $installments(cantidad de meses)
          $installments = explode(",", $valor);
          //valida si el $installments esta vacio
          if ($installments[0]=="") {
            $installments=[];
          }
          //valida el tipo de credito --> si es necerio agragar un nuevo tipo de credto agregar un case nuevo
          switch ($clave) {
            case 'corriente':
            if ($valor == 'si') {
              $array[]=[
              'code'=>'0',
              'groupCode'=>'C',
              'type'=>'00',
              'installments'=>['0']];
            }
              break;
            case 'creditoP0':
              // Diferido con interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'0',
                'groupCode'=>'P',
                'type'=>'02',
                'installments'=>$installments];
              }
              break;
            case 'creditoP1':
              // Diferido 1 mes gracia con interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'1',
                'groupCode'=>'P',
                'type'=>'07',
                'installments'=>$installments];
              }
              break;
            case 'creditoP2':
              // Diferido 2 meses gracia con interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'2',
                'groupCode'=>'P',
                'type'=>'07',
                'installments'=>$installments];
              }
              break;
            case 'creditoP3':
              // Diferido 3 meses gracia con interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'3',
                'groupCode'=>'P',
                'type'=>'07',
                'installments'=>$installments];
              }
              break;
            case 'creditoD0':
              // Diferido sin interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'0',
                'groupCode'=>'D',
                'type'=>'03',
                'installments'=>$installments];
              }
              break;
            case 'creditoD1':
              // Diferido 1 mes gracia sin interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'1',
                'groupCode'=>'D',
                'type'=>'09',
                'installments'=>$installments];
              }
              break;
            case 'creditoD2':
              // Diferido 2 meses gracia sin interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'2',
                'groupCode'=>'D',
                'type'=>'09',
                'installments'=>$installments];
              }
              break;
            case 'creditoD3':
              // Diferido 3 meses gracia sin interés
              if (!empty($installments)) {
                $array[]=[
                'code'=>'3',
                'groupCode'=>'D',
                'type'=>'09',
                'installments'=>$installments];
              }
              break;
          }
          $index++;

    }
// print_r($array);die();
// "include" es la llave para el array
    $Datafast->include= $array;
    return $Datafast ;
  }
}
// header('Content-Type: application/json');
header('Content-Type: text/html; charset=utf-8');
$new = new Filtro_tipo_Credito();
$resultado = $new->filtroTest($_POST);
$denco= json_encode($resultado);
echo $denco;

// var_dump($porciones);
// var_dump($_POST["creditoP0"]);
