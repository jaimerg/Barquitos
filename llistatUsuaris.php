<?php
$host="localhost";
        $user="root";
        $password="";
        $database="barcos";
$conexion = mysqli_connect($host, $user, $password, $database);

$consulta = mysqli_query($conexion,"select * from usuarios");

while ($registro = mysqli_fetch_array($consulta)) {
    if ($registro['estado'] == 1) {
        echo ("<div class='fila_registro'>" . $registro['nick'] . '</div>');
    }
}

?>