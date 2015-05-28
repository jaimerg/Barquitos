<?php

session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$usuario = $_SESSION['user'];

$turno = 0;

$query123 = mysqli_query($conexion,"select * from partida where id_partida=(select id_partida from usuarios where nick='".$usuario."')");
   
        while ($registro = mysqli_fetch_array($query123)) {
           
                if($registro['turno']==$_SESSION['id']){
                    $turno = 1;
                }
      
        }

$respuesta = '{"turno":"'.$turno.'"}';
echo $respuesta;

