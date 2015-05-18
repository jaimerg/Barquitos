<?php

session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
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

