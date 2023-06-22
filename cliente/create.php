<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
$json = file_get_contents('php://input');
$params = json_decode($json);

require("conex.php");
$con = retornarConexion();

sqlsrv_query($con, "insert into cliente (id_cliente, nombre_cliente, apellido_cliente, direccion_cliente, telefono_cliente, correo_cliente) VALUES ($params->id_cliente, '$params->nombre_cliente', '$params->apellido_cliente', '$params->direccion_cliente', '$params->telefono_cliente' ,'$params->correo_cliente')");


class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'Usuario Agregado';

header('Content-Type: application/json');
echo json_encode($response);

?>