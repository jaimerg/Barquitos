<?php
session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

/*
$conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

$consulta = mysql_query("select * from usuarios");
*/
$nick = $_POST['nombre'];
$respuesta = '{'; 
$ok = false; 
while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $nick && $registro['estado'] == 1){
        $ok = "true";
        $respuesta = $respuesta . '"disponible":"'.$ok.'"';
    }
}
$respuesta = $respuesta . '}';
echo $respuesta;

?>