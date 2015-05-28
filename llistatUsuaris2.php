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

$usuario = $_SESSION['user'];

$consulta = mysqli_query($conexion,"select * from usuarios where nick!='".$usuario."'");

$i=0;
$respuesta = '{'; 
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['estado'] == 1) {
        $i++;
        $nick = $registro['nick'];
        $respuesta = "".$respuesta . '"nombre'.$i.'":{"nombre":"'.$nick.
                '", "id":"'.$registro['id'].
                '", "p_ganadas":"'.$registro['p_ganadas'].
                '", "p_perdidas":"'.$registro['p_perdidas'].
                '", "peticion":"'.$registro['peticion'].'"},';
        
    }
}


$respuesta = $respuesta . ' "i":"'.$i.'"}';
echo $respuesta;

?>