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

//$consulta = mysqli_query($conexion,"select * from usuarios");

$user2 = $_SESSION['user']; // Mi nombre de usuario
$nick = $_POST['nombre']; // Nombre del jugador al que se reta
$respuesta = '{'; 
$ok = false; 
$estado=2;

$consulta = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta)) {
    if($registro['nick'] == $user2){
        $ok = "true";
        $respuesta = $respuesta . '"disponible":"'.$ok.'"';
        $q="update usuarios set peticion='".$registro['id']."' where nick='".$nick."'";
//      echo $q;
        $sql = mysqli_query($conexion,$q);  // insertar su id en mi peticion
        // cambio a estado 2
        //$sql2 = mysqli_query($conexion, "update usuarios set estado='".$estado."' where nick='".$user2."'");
        
    }
}
$consulta2 = mysqli_query($conexion,"select * from usuarios");
while ($registro = mysqli_fetch_array($consulta2)) {
    // update de mi registro
    if($registro['nick'] == $nick){
        $q="update usuarios set peticion='".$registro['id']."' where nick='".$user2."'";
//        echo $q;
        $sql = mysqli_query($conexion,$q); // para insertar id en su peticion
        // cambio a estado 2
        //$sql3 = mysqli_query($conexion, "update usuarios set estado='".$estado."' where nick='".$nick."'");
    
    }
    
    
}



/*************************/
    $id_usu1;
    $id_usu2;
    /*-------------- Turnos de juego -----------------*/
    $consultaturnos = mysqli_query($conexion,"select * from usuarios ");
    while ($registro = mysqli_fetch_array($consultaturnos)) {
        if ($registro['nick'] == $user2) {
            //$query="insert into usuarios (nick,password,id,p_ganadas,p_perdidas,estado,peticion) values ('".$nick."','".$pass1."','".$null."','".$a."','".$a."','".$a."','".$a."')";
            $turnos = "insert into partida (id_usu1,id_usu2,turno) values ('".$registro['id']."','".$registro['peticion']."','".$registro['id']."')";
            //echo $turnos;
            $sql = mysqli_query($conexion, $turnos);
            
            $id_usu1 = $registro['id'];
            $id_usu2 = $registro['peticion'];
        }
    }
    //insertando ID de la partida
    $consultaid = mysqli_query($conexion,"select * from partida where id_usu1='".$id_usu1."'");
    while ($registro = mysqli_fetch_array($consultaid)) {
        if ($registro['id_usu1'] == $id_usu1) {
            //$query="insert into usuarios (nick,password,id,p_ganadas,p_perdidas,estado,peticion) values ('".$nick."','".$pass1."','".$null."','".$a."','".$a."','".$a."','".$a."')";
            $query = "update usuarios set id_partida='".$registro['id_partida']."' where id='".$id_usu1."'";
            $sql = mysqli_query($conexion, $query);
            $query2 = "update usuarios set id_partida='".$registro['id_partida']."' where id='".$id_usu2."'";
            $sql2 = mysqli_query($conexion, $query2);
        }
    }
    /*************************/







$respuesta = $respuesta . '}';
echo $respuesta;

?>