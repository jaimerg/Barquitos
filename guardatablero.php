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

$usuario = $_SESSION['user'];

$tab = $_POST['tablero']; 
//$markers = json_decode($tab);
$query = "update usuarios set tablero='".$tab."' where nick='".$usuario."'";
//echo $query;
$sql = mysqli_query($conexion, $query);
//echo $tablero;



?>

