<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');

    $json = file_get_contents('php://input');

    $params = json_decode($json);

    require("conex.php");
    $con=retornarConexion();

    sqlsrv_query($con,"delete from proveedor where id_proveedor=$_GET[id]");


    class Result{}

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje ='usuario borrado';

    header('Content-Type: application/json');
    echo json_encode($response);

?>