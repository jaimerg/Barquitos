<?php
session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

$usuario = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 3;

while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        $query = "update usuarios set estado='".$estado."' where nick='".$usuario."'";
        echo $query;
        $sql = mysqli_query($conexion, $query);
        
    }
}

?>