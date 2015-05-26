<?php

session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$usuario = $_SESSION['user'];

$consulta = mysqli_query($conexion,"select * from usuarios");

$query = "SELECT tablero from usuarios  where id=(SELECT peticion from usuarios where nick='".$usuario."')"; 
$consulta2 = mysqli_query($conexion, $query);

$y=0;
$win = false;
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
}

if($y == 100){
    $win = true;
}

$respuesta = '{"win":"'.$win.'"}';
echo $respuesta

?>

