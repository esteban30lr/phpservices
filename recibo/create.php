<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');
$json = file_get_contents('php://input');
$params = json_decode($json);

require("conex.php");
$con = retornarConexion();

$query = 'INSERT INTO recibo (id_producto, total, id_cliente, fecha, cantidad) 
          VALUES (?, (SELECT precio FROM producto WHERE id_producto = ?) * ?, ?, ?, ?)';

$params = array($params->id_producto, $params->id_producto, $params->cantidad, $params->id_cliente, $params->fecha, $params->cantidad);

$stmt = sqlsrv_query($con, $query, $params);
 
class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'Producto Agregado';

header('Content-Type: application/json');
echo json_encode($response);

?> 