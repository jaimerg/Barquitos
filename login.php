<?php
    session_start();
?>
<html>
    <title>Barcas</title>
    <!--link rel="icon" type="image/ico" href="/imagenes/favicon.ico" /> -->
</html>

<?php
    $_SESSION['id'];
    $_SESSION['user'] = $_POST['nick'];
    $nick = $_POST['nick'];
    $_SESSION['pass'] = $_POST['password'];
    $pass = $_POST['password'];
    $usu = false;

    $conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
    mysql_select_db("barcos", $conexion) or die ("no se puede conectar");
	
    $consulta = mysql_query("select * from usuarios");
        
    while($registro=mysql_fetch_array($consulta)){
        if($registro['nick'] == $nick && $registro['password'] == $pass){
            $_SESSION['id'] = $registro['id'];
            header("Location:paginausuario.php");
            $usu = true;
        }
    }
    
    if($usu == false){
        header("Location:index.php");
    }

?>
