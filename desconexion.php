<?php
session_start();

$conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$estado = 0;
$sql = mysql_query("update usuarios set estado='".$estado."' where nick='".$user."' and password='".$pass."'");

session_unset();
header("Location:index.php");

?>