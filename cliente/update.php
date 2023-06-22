<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
    header('Content-Type: application/json');
    $json = file_get_contents('php://input');
    $params = json_decode($json);

    require("conex.php");
    $con=retornarConexion();

    sqlsrv_query($con,"update cliente set id_cliente=$params->id_cliente,  
                                            nombre_cliente='$params->nombre_cliente', 
                                            apellido_cliente='$params->apellido_cliente', 
                                            telefono_cliente='$params->telefono_cliente',
                                            direccion_cliente='$params->direccion_cliente', 
                                            correo_cliente='$params->correo_cliente'
                                            where id_cliente=$params->id_cliente");


class Result{}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'usuario modificado';

    header('Content-Type: application/json');
    echo json_encode($response);

?>