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

$turno = 0;
$ganador=-1;
$query123 = mysqli_query($conexion,"select * from partida where id_partida=(select id_partida from usuarios where nick='".$usuario."')");
   
        while ($registro = mysqli_fetch_array($query123)) {
           
                if($registro['turno'] == $_SESSION['id']){
                    $turno = 1;
                }
                $ganador=$registro['ganador'];
      
        }




if($ganador !=-1 && $ganador!=$_SESSION['id']){
    $respuesta = '{"turno":"'.$turno.'","ganador":"loser"}';
}else{
    $respuesta = '{"turno":"'.$turno.'","ganador":"'.$_SESSION['id'].'"}';
}
 //$respuesta = '{"turno":"'.$turno.'","ganador":"'.$ganador.'"}';

echo $respuesta;

?>