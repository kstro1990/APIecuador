<?php
include('autenticacion.php');
/**
 *
 */
class Mpi
{
  function lookup()
  {
    $request = new stdClass();
    $new = new Autenticacion();
    $request->auth = $new ->auth();
    $request->instrument = $new -> tdcSet("4111111111111111","123","07","20");
    $request->payment = $new -> amountSet("90");
    $request->returnUrl = "www.test.test";
    $denco= json_encode($request);
    // return $denco;
    $url = 'https://test.placetopay.ec/rest/gateway/mpi/lookup';
    //Se inicia. el objeto CUrl
    $ch = curl_init($url);
    //creamos el json a partir del arreglo
    //$jsonDataEncoded = json_encode($request);
    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_POST, 1);
    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Adjuntamos el json a nuestra petición  $jsonDataEncoded
    curl_setopt($ch, CURLOPT_POSTFIELDS, $denco);
      //Agregar los encabezados del contenido
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'User-Agent: cUrl Testing'));
    //Ejecutamos la petición
    $result = curl_exec($ch);
    //$R = ((string) json_encode($request));
    return  $denco;
  }

  function query()
  {
    $request = new stdClass();
    $new = new Autenticacion();
    $request->auth = $new ->auth();
    $request->instrument = $new -> tdcSet("4154650000000016","123","07","20");
    $request->payment = $new -> amountSet("80");
    $request->id = "73306";
    $denco= json_encode($request);
    // return $denco;
    $url = 'https://test.placetopay.ec/rest/gateway/mpi/query';
    //Se inicia. el objeto CUrl
    $ch = curl_init($url);
    //creamos el json a partir del arreglo
    //$jsonDataEncoded = json_encode($request);
    //Indicamos que nuestra petición sera Post
    curl_setopt($ch, CURLOPT_POST, 1);
    //para que la peticion no imprima el resultado como un echo comun, y podamos manipularlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //Adjuntamos el json a nuestra petición  $jsonDataEncoded
    curl_setopt($ch, CURLOPT_POSTFIELDS, $denco);
      //Agregar los encabezados del contenido
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'User-Agent: cUrl Testing'));
    //Ejecutamos la petición
    $result = curl_exec($ch);
    //$R = ((string) json_encode($request));
    return  $denco;
  }

}

$new = new Mpi();
$resultado = $new ->query();

var_dump($resultado);
 ?>
