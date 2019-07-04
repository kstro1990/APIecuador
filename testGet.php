<?php
// echo $_SERVER['REMOTE_ADDR'] . "\n\n";
include('autenticacion.php');

// $request = new stdClass();
// $new = new Autenticacion();
// $request->auth = $new ->auth();
// $request->instrument = $new -> tdcSet("4111111111111111","","","");
// $request->payment = $new -> amountSet("90.36");
// $denco= json_encode($request);

$new = new Autenticacion();
$resultado = $new ->auth();


$denco= json_encode($resultado);
echo $denco;


// var_dump($denco);
?>
