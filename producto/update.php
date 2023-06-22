<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
    header('Content-Type: application/json');
    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("conex.php");
    $con=retornarConexion();

    sqlsrv_query($con,"update producto set id_producto=$params->id_producto,  
                                            id_proveedor='$params->id_proveedor', 
                                            cantidad='$params->cantidad', 
                                            nombre_producto='$params->nombre_producto',
                                            precio='$params->precio'
                                            where id_producto=$params->id_producto");


class Result{}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'usuario modificado';

    header('Content-Type: application/json');
    echo json_encode($response);

?>