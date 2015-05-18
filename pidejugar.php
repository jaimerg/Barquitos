<?php
session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

$user2 = $_SESSION['user']; // Mi nombre de usuario
$nick = $_POST['nombre']; // Nombre del jugador al que se reta
$respuesta = '{'; 
$ok = false; 



while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $nick && $registro['estado'] == 1){
        $ok = "true";
        $respuesta = $respuesta . '"disponible":"'.$ok.'"';
        $q="update usuarios set peticion='".$registro['id']."' where nick='".$user2."'";
//        echo $q;
        $sql = mysqli_query($conexion,$q);  // insertar su id en mi peticion
        
        $sql1 = mysqli_query("update usuarios set estado=2 where nick='".$nick."'");
        $sql2 = mysqli_query($conexion,$sql1);
    }
    // update de mi registro
    if($registro['nick'] == $user2 && $registro['estado'] == 1){
        $q="update usuarios set peticion='".$registro['id']."' where nick='".$nick."'";
//        echo $q;
        $sql = mysqli_query($conexion,$q); // para insertar id en su peticion
    
        $sql3 = mysqli_query("update usuarios set estado=2 where nick='".$user2."'");
        $sql4 = mysqli_query($conexion,$sql3);
    }
    
    
}
$respuesta = $respuesta . '}';
echo $respuesta;

?>