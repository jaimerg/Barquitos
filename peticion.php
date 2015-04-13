<?php
session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

$user2 = $_SESSION['user']; // Mi nombre de usuario

$ok = "nok";
$respuesta = '{'; 

while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $user2 && $registro['id'] != 0){
        $ok = "ok";
        $respuesta = $respuesta . '"peticion":"'.$ok.'"';
    }
}

$respuesta = $respuesta . '}';
echo $respuesta;

?>