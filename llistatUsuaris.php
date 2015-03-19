<?php
$host="localhost";
        $user="root";
        $password="";
        $database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

$array = array() ;
$i=1;
$respuesta = '{'; 
while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['estado'] == 1) {
        //echo ("<div class='fila_registro'>" . $registro['nick'] . '</div>');
        //array_push($array, $registro['nick']);
        $nick = $registro['nick'];
        $respuesta = $respuesta + '"nombre'+$i+'":"'.$nick.'",';
        $i++;
    }
}
$respuesta = $respuesta + ' "i":"'.$i.'"}';
echo $respuesta;

?>