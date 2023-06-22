<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
    header('Content-Type: application/json');

    require("conex.php");
    $con=retornarConexion();

    $registro=sqlsrv_query($con,"select * from cliente where id_cliente=$_GET[id]");
    $vec=[];
    if($reg=sqlsrv_fetch_array($registro)){
        $vec[]=$reg;
    }

    $cad = json_encode($vec);
    echo $cad;
    header('Content-Type: application/json');
?>