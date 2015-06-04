<?php
session_start();
/*
$conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
mysql_select_db("barcos", $conexion) or die ("no se puede conectar");
$conexion=mysql_connect("mysql.hostinger.es","u883679537_usu","95826440") or die ("no se puede conectar");
mysql_select_db("u883679537_1", $conexion) or die ("no se puede conectar");*/
/*
$host="localhost";
$user="root";
$password="";
$database="barcos";*/
$host="mysql.hostinger.es";
$usuario="u883679537_usu";
$password="95826440";
$database="u883679537_1";

$conexion = mysqli_connect($host, $usuario, $password, $database);

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 0;
$tablero = "";
$sql = mysqli_query("update usuarios set estado='".$estado."', tablero='".$tablero."'  where nick='".$user."' and password='".$pass."'");

$consulta = mysqli_query("select * from usuarios");

// quitar los ids de los jugadores si uno se desconecta
while ($registro = mysql_fetch_array($consulta)) {
    if($registro['nick'] == $user){
        $sql2 = mysqli_query("update usuarios set peticion=0, id_partida=0 where nick='".$user."'");
        $sql3 = mysqli_query("update usuarios set peticion=0, id_partida=0 where id='".$registro['peticion']."'");        
        print $user;
        echo $registro['peticion'];
    }
}


session_unset();

header("Location:index.php");

 

?>