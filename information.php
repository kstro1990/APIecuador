<?php
include('autenticacion.php');
/**
 * Luis Castro
 */
class information
{
  public function sendInformation()
  {
    $request = new stdClass();
    $new = new Autenticacion();
    $request->auth = $new ->auth();
    $request->instrument = $new -> tdcSet("4111111111111111","","","");
    $request->payment = $new -> amountSet("90.36");
    $denco= json_encode($request);
    // return $denco;
    $url = 'https://test.placetopay.ec/rest/gateway/information';
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
session_start();
$new = new information();
$resultado = $new ->sendInformation();
$_SESSION["respuesta"]=$resultado;
// echo $resultado;
echo $_SESSION["respuesta"];

 ?>
