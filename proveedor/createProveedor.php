<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
$json = file_get_contents('php://input');
$params = json_decode($json);

require("conex.php");
$con = retornarConexion();

sqlsrv_query($con, "insert into proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, telefono_proveedor, web_proveedor) VALUES ($params->id_proveedor, '$params->nombre_proveedor', '$params->direccion_proveedor', '$params->telefono_proveedor', '$params->web_proveedor')");


class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'Proveedor Agregado';

header('Content-Type: application/json');
echo json_encode($response);

?>