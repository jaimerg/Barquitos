<?php

session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$usuario = $_SESSION['user'];

$consulta = mysqli_query($conexion,"select * from usuarios");
$_SESSION['tablero'];

while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        $tablero = json_decode($registro['tablero']);
        $_SESSION['tablero'] = $tablero;
        
        echo $registro['tablero'];
    }
}


?>

