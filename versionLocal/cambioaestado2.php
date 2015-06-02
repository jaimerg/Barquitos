<?php
session_start();
	
$host="localhost";
$user="root";
$password="";
$database="barcos";/*
$host="mysql.hostinger.es";
$user="u883679537_usu";
$password="95826440";
$database="u883679537_1";*/


$conexion = mysqli_connect($host, $user, $password, $database);


$user2 = $_SESSION['user']; // Mi nombre de usuario
$estado = 2;

$consulta = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $user2){
        
        // cambio a estado 2
        $sql2 = mysqli_query($conexion, "update usuarios set estado='".$estado."' where nick='".$user2."'");
        
    }
}



?>