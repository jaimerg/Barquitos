<?php

session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$usuario = $_SESSION['user'];
$id_contrario;

SELECT tablero from usuarios  where id=(SELECT peticion from usuarios where nick='asd') 

//$consulta = mysqli_query($conexion,"select * from usuarios");
$consulta = mysqli_query($conexion,"select tablero from usuarios where id=' '");
 
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        $id_contrario = $registro['peticion'];
       
        $tablero = json_decode($consulta2);
        
        echo $tablero;
       // echo $registro['tablero'];
    }
}
