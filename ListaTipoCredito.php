<?php

/**
 * lista de tipo de credito en Datafast
 *Luis Castro
 *06/12/2019
 */
class Filtro_tipo_Credito
{

  function filtroTest ()
  {
    $Datafast = new stdClass();
    $filtro = new stdClass();
    $installments = new stdClass();
    $code = new stdClass();
    $groupCode = new stdClass();
    $type = new stdClass();
    $array = new stdClass();

    $code=0;
    $groupCode="P";
    $type="02";
    $installments=[0,1,2,3];

    // $Datafast->DATAFAST = $code;
    // $Datafast->groupCode = $groupCode;
    // $Datafast->type = $type;
    // $Datafast->installments = $installments;

    $array=[
    'code'=>$code,
    'groupCode'=>$groupCode,
    'type'=>$type,
    'installments'=>$installments];
// "include" es la llave para el array 
    $Datafast->include= [$array,$array];
    return $Datafast ;
  }
}
header('Content-Type: application/json');
$new = new Filtro_tipo_Credito();
$resultado = $new->filtroTest();


$denco= json_encode($resultado);
echo $denco;
