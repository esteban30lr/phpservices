<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
//conexion
require("conex.php");
$con = retornarConexion();
//racolectar parametros
$json = file_get_contents('php://input');
$params = json_decode($json);

//validar variables 
$password = $params->contrasena;
$id = $params->id;
$nombre = $params->nombre;
$direccion = $params->direccion;
$telefono = $params->telefono;
$web = $params->web;

$hash = hash('sha256', $password);
$encode = $password . $hash;
$estado = 'OK';
$query = "INSERT INTO admin (id, nombre, direccion, telefono, web, password) VALUES ('$id','$nombre', '$direccion', '$telefono', '$web' ,'$encode')";

$stmt = sqlsrv_query($con, $query);
if ($stmt === false) {
    $estado = 'FALSE';
}

class Result
{
}

$response = new Result();
$response->resultado = $estado;
$response->hash = $encode;
$cad = json_encode($response);
echo $cad;
?>
