<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
    header('Content-Type: application/json');
    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("conex.php");
    $con=retornarConexion();

    sqlsrv_query($con,"update proveedor set id_proveedor=$params->id_proveedor,  
                                            nombre_proveedor='$params->nombre_proveedor', 
                                            direccion_proveedor='$params->direccion_proveedor', 
                                            telefono_proveedor='$params->telefono_proveedor',
                                            web_proveedor='$params->web_proveedor'
                                            where id_proveedor=$params->id_proveedor");


class Result{}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'usuario modificado';

    header('Content-Type: application/json');
    echo json_encode($response);

?>