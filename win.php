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

$consulta = mysqli_query($conexion,"select * from usuarios");

$query = "SELECT tablero,id,id_partida from usuarios  where id=(SELECT peticion from usuarios where nick='".$usuario."')"; 
$consulta2 = mysqli_query($conexion, $query);

$idpartida;
$y=0;
$win = "false";
$ganador=-1;
while ($registro = mysqli_fetch_array($consulta2)) {
    $tablero = $registro['tablero'];
    $tableroArray = json_decode($tablero);
    for ($i=0; $i<10; $i++) {
        for ($j=0; $j<10; $j++) {
            $a = $tableroArray[$i][$j];
            if($a == 0){
                $y++;
            }
        }
    } 
    
   
   // $ganador=$registro['id'];
    
    $idpartida = $registro['id_partida'];
}

if($y == 100){
    $win = "true";
    $ganador=$_SESSION['id'];
     $_SESSION['ganador'] = $ganador;
    $query = mysqli_query($conexion,"update partida set ganador='".$ganador."' where id_partida='".$idpartida."'");
    
}




//$respuesta = '{"win":"'.$win.'", "ganador":"'.$_SESSION['ganador'].'"}';
$respuesta = '{"win":"'.$win.'", "ganador":"'.$ganador.'"}';
echo $respuesta

?>

