<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requestes-Whit, Content-Type, Accept');
header('Content-Type: application/json');

    require("conex.php");
    $con=retornarConexion();

    $registros=sqlsrv_query($con,"SELECT SUM(total) AS suma_total FROM recibo WHERE id_cliente = '$_GET[id]'");
    $vec=[];
    while($reg=sqlsrv_fetch_array($registros)){
        $vec[]=$reg;
    }

    $cad = json_encode($vec);
    echo $cad;
    header('Content-Type: application/json');
?>