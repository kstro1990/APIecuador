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

// idthre
// tdc $_POST['tdc'];
// if((isset($_POST['action']) && !empty($_POST['action']))&& (isset($_POST['tdc']) && !empty($_POST['tdc']))) {
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $new = new Mpi();
    $action = $_POST['action'];
    switch($action) {
        case 'lookup' :
        //$resultado= $_POST['tdc'];
        //$resultado = $new ->lookup();
        echo var_dump($_POST);
        break;
        case 'query' :
        $resultado = $new ->query();
        echo $resultado;
        break;
        // ...etc...
    }
}

// $new = new Mpi();
// $resultado = $new ->lookup();
// var_dump($resultado);
 ?>
