<?php
session_start();

$conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 0;
$sql = mysql_query("update usuarios set estado='".$estado."' where nick='".$user."' and password='".$pass."'");

$consulta = mysql_query("select * from usuarios");

// quitar los ids de los jugadores si uno se desconecta
while ($registro = mysql_fetch_array($consulta)) {
    if($registro['nick'] == $user){
        $sql2 = mysql_query("update usuarios set estado=0 where nick='".$user."'");
        $sql3 = mysql_query("update usuarios set estado=0 where nick='".$resgistro['peticion']."'");        
    }
}


session_unset();
header("Location:index.php");

?>