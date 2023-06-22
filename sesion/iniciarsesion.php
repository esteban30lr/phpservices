<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

// Conexión
require("conex.php");
$con = retornarConexion();

// Recolección de parámetros
$json = file_get_contents('php://input');
$params = json_decode($json);

// Validar variables 
$id = $params->id;
$password = $params->contrasena;
$hash = hash('sha256', $password);
$encode = $password . $hash;

$estado = 'OK';

// Consulta SELECT con validación de ID y contraseña
$query = "SELECT * FROM admin WHERE id = '$id' AND password = '$encode'";
$result = sqlsrv_query($con, $query);

if ($result === false) {
    $estado = 'FALSE';
} else {
    if (sqlsrv_has_rows($result)) {
        // Existen registros que coinciden con el ID y la contraseña
        $estado = 'MATCH';
    } else {
        // No se encontraron registros que coincidan con el ID y la contraseña
        $estado = 'NO_MATCH';
    }
}

class Result {}

$response = new Result();
$response->resultado = $estado;
$response->hash = $encode;
$cad = json_encode($response);
echo $cad;
?>
