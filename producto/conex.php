<?php
function retornarConexion()
{
    $serverName = "DESKTOP-VVT0133";
    $connectionOptions = array(
        "Database" => "importSecurity",
        "Uid" => "esteban",
        "PWD" => "0000"
    );

    // Establecer la conexión
    $con = sqlsrv_connect($serverName, $connectionOptions);

    return $con;
}
?>