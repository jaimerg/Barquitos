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

$u1 = false;
$u2 = false;
$idu2;

$consulta = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        
        if($registro['estado'] == 3){
            $u1 = true;
        }
        $idu2 = $registro['peticion'];
        
    }
    
}

$consulta2 = mysqli_query($conexion,"select * from usuarios");

while ($registro = mysqli_fetch_array($consulta2)) {
    if ($registro['id'] == $idu2) {
        if($registro['estado'] == 3){
            $u2 = true;
        }
    }
}
/*
if($u1==true && $u2==true){
    
}
*/


$respuesta = '{"usu1":"'.$u1.'", "usu2":"'.$u2.'"}';
echo $respuesta;

?>