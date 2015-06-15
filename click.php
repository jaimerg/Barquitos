<?php

session_start();
/*
$host="localhost";
$user="root";
$password="";
$database="barcos";*/
$host="mysql.hostinger.es";
$user="u883679537_usu";
$password="95826440";
$database="u883679537_1";

$conexion = mysqli_connect($host, $user, $password, $database);

$usuario = $_SESSION['user'];
$id_contrario;

$query = "SELECT tablero from usuarios  where id=(SELECT peticion from usuarios where nick='".$usuario."')"; 
//echo $query;
$consulta2 = mysqli_query($conexion, $query);

$fila = $_POST['fila'];
$columna = $_POST['columna'];

while ($registro = mysqli_fetch_array($consulta2)) {
    $tablero = $registro['tablero'];
    $tableroArray = json_decode($tablero);
    $tiro = $tableroArray[$fila][$columna]; 
    
    if($tiro==0 || $tiro=="0"){
        $query123 = mysqli_query($conexion,"select * from partida where id_partida=(select id_partida from usuarios where nick='".$usuario."')");
        //echo $query123;
        while ($registro = mysqli_fetch_array($query123)) {
            //if($registro['nick'] == $usuario){
                if($registro['turno']==$_SESSION['id']){
                    $query321 = "update partida set turno='".$_SESSION['idc']."' where turno='".$_SESSION['id']."'";
                    $sql321 = mysqli_query($conexion, $query321);
                }
           // }
        }
    }
    
    else if($tiro==1 || $tiro=="1"){
        $tableroArray[$fila][$columna]="0";
        $arrayjson = json_encode($tableroArray);

        $query50 = mysqli_query($conexion,"select * from usuarios");
        while ($registro = mysqli_fetch_array($query50)) {
            if($registro['nick'] == $usuario){    
                $query123 = "update usuarios set tablero='".$arrayjson."' where id='".$registro['peticion']."'";
                $sql123 = mysqli_query($conexion, $query123);
            }
        }
    }
    
  
    //echo "tiro: ".$tiro;
     
}
$respuesta = '{"tiro":"'.$tiro.'","fila":"'.$fila.'","columna":"'.$columna.'"}';
echo $respuesta;


//$consulta = mysqli_query($conexion,"select * from usuarios");
/*$consulta = mysqli_query($conexion,"select tablero from usuarios where id=' '");
 
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['nick'] == $usuario) {
        $id_contrario = $registro['peticion'];
       
        $tablero = json_decode($consulta2);
        
        echo $tablero;
       // echo $registro['tablero'];
    }
}*/
