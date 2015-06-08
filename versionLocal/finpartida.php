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

$usuario = $_SESSION['user'];


$consulta = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        
        
    }
    
}

