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

$consulta = mysqli_query($conexion,"select * from usuarios");

$usuario = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 3;
$_SESSION['ganador'];
$_SESSION['id'];
$_SESSION['idc'];

while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        $query = "update usuarios set estado='".$estado."' where nick='".$usuario."'";
        //echo $query;
        $sql = mysqli_query($conexion, $query);
        
        //variables de sesion para la partida
        $_SESSION['id'] = $registro['id'];
        $_SESSION['idc'] = $registro['peticion'];
    }
}

?>