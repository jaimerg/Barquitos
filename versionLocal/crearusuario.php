<?php
    session_start();
?>
<html>
    <title>Barcas</title>
    <!--link rel="icon" type="image/ico" href="/imagenes/favicon.ico" /> -->
</html>

<?php

    $nick = $_POST['cnick'];
    $pass1 = $_POST['cpassword'];
    $pass2 = $_POST['cpassword2'];
    $check = $_POST['check'];
    $boolean = false;
    $a = 0;
    $null = null;
    
    /* 
$host="mysql.hostinger.es";
$user="u883679537_usu";
$password="95826440";
$database="u883679537_1"; */
    /*
    $conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
    mysql_select_db("barcos", $conexion) or die ("no se puede conectar");
    $conexion=mysql_connect("mysql.hostinger.es","u883679537_usu","95826440") or die ("no se puede conectar");
    mysql_select_db("u883679537_1", $conexion) or die ("no se puede conectar");

    $consulta = mysql_query("select * from usuarios");*/
    
    $host="localhost";
    $user="root";
    $password="";
    $database="barcos";/*
    $host="mysql.hostinger.es";
    $user="u883679537_usu";
    $password="95826440";
    $database="u883679537_1";*/

    $conexion = mysqli_connect($host, $user, $password, $database);

    $consulta = mysqli_query($conexion,"select * from usuarios");
    
    while($registro=mysqli_fetch_array($consulta)){
        if($registro['nick'] == $usuario){
            $boolean = true;
        }
    }
    
    if($pass1 == $pass2 && /*$check == true &&*/ $boolean==false){
        $query="insert into usuarios (nick,password,id,p_ganadas,p_perdidas,estado,peticion) values ('".$nick."','".$pass1."','".$null."','".$a."','".$a."','".$a."','".$a."')";
        //echo $query;
        mysql_query($query, $conexion);
        
    }
   
        header("Location:index.php");
?>