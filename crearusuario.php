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

    $conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
    mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

    $consulta = mysql_query("select * from usuarios");

    while($registro=mysql_fetch_array($consulta)){
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