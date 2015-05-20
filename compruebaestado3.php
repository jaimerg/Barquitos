<?php


session_start();

$host="localhost";
$user="root";
$password="";
$database="barcos";
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

if($u1==true && $u2==true){
    /*************************/
    /*-------------- Turnos de juego -----------------*/
    $consultaturnos = mysqli_query($conexion,"select * from usuarios");
    while ($registro = mysqli_fetch_array($consultaturnos)) {
        if ($registro['nick'] == $usuario) {
            //$query="insert into usuarios (nick,password,id,p_ganadas,p_perdidas,estado,peticion) values ('".$nick."','".$pass1."','".$null."','".$a."','".$a."','".$a."','".$a."')";
            $turnos = "insert into partida (id_usu1,id_usu2,turno) values ('".$registro['id']."','".$registro['peticion']."','".$registro['id']."')";
            echo $turnos;
            $sql = mysqli_query($conexion, $turnos);
        }
    }
    /*************************/
}



$respuesta = '{"usu1":"'.$u1.'", "usu2":"'.$u2.'"}';
echo $respuesta;

?>