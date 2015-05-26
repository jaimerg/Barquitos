<?php
session_start();

$conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 0;
$tablero = "";
$sql = mysql_query("update usuarios set estado='".$estado."', tablero='".$tablero."'  where nick='".$user."' and password='".$pass."'");

$consulta = mysql_query("select * from usuarios");

// quitar los ids de los jugadores si uno se desconecta
while ($registro = mysql_fetch_array($consulta)) {
    if($registro['nick'] == $user){
        $sql2 = mysql_query("update usuarios set peticion=0, id_partida=0 where nick='".$user."'");
        $sql3 = mysql_query("update usuarios set peticion=0, id_partida=0 where id='".$registro['peticion']."'");        
        print $user;
        echo $registro['peticion'];
    }
}


session_unset();

header("Location:index.php");

 

?>