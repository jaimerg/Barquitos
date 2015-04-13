<?php
$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

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