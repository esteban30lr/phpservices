<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
$json = file_get_contents('php://input');
$params = json_decode($json);

require("conex.php");
$con = retornarConexion();

sqlsrv_query($con, "insert into producto (id_producto, id_proveedor, cantidad, nombre_producto, precio) VALUES ($params->id_producto, '$params->id_proveedor', '$params->cantidad', '$params->nombre_producto', '$params->precio')");


class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'Producto Agregado';

header('Content-Type: application/json');
echo json_encode($response);

?>