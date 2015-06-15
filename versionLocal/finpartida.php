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

$estado = 1;
$peticion = 0;
$consulta = mysqli_query($conexion,"select * from usuarios");
$id_peticion;

//consulta para el otro usuario
/*
$query2 = "SELECT id from usuarios where id=(SELECT peticion from usuarios where id='".$_SESSION['ganador']."')"; 
$consulta2 = mysqli_query($conexion,$query2);
*/
////////////////
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['id'] == $_SESSION['ganador']) {
        $p_ganadas = $registro['p_ganadas']+1;
        $query = mysqli_query($conexion,"update usuarios set p_ganadas='".$p_ganadas."' where id='".$registro['id']."'");
        $sql = mysqli_query($conexion,"update usuarios set estado='".$estado."', peticion='".$peticion."', tablero='', id_partida=0 where nick='".$usuario."'");
        $id_peticion = $registro['peticion'];
    } 
}

$consulta2 = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta2)) {
    if ($registro['id'] == $id_peticion) {
        $p_perdidas = $registro['p_perdidas']+1;
        $query = mysqli_query($conexion,"update usuarios set p_perdidas='".$p_perdidas."' where id='".$registro['id']."'");
        $sql = mysqli_query($conexion,"update usuarios set estado='".$estado."', peticion='".$peticion."', tablero='', id_partida=0 where id='".$id_peticion."'");
    } 
}

echo '{"asd":""}';

?>