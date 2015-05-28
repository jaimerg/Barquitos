<?php
session_start();
/*
$host="localhost";
$user="root";
$password="";
$database="barcos";*/
$host="mysql.hostinger.es";
$user="u883679537_usu";
$password="95826440";
$database="u883679537_1";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

$user2 = $_SESSION['user']; // Mi nombre de usuario

$ok = "nok";
$respuesta = '{'; 

while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $user2 /*&& $registro['estado'] == 1*/){
        $ok = "ok";
        $respuesta = $respuesta . '"peticion":"'.$ok.'"';
    }
}

$respuesta = $respuesta . '}';
echo $respuesta;

?>