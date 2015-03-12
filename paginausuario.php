<?php
    session_start();
    
    if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
        
        $conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
        mysql_select_db("barcos", $conexion) or die ("no se puede conectar");

        $user = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        $estado = 1;
        $sql = mysql_query("update usuarios set estado='".$estado."' where nick='".$user."' and password='".$pass."'");
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="script.js"></script>
        <title>Barquitos</title>
    </head>
    <body>
        <div id="contenedorpu">
            <br/>
            <h1 class="titulos"> Bienvenido al mejor juego de barcos de la historia de barcos </h1>
            <div id="lista2">
                <h3 class="titulos">Lista de usuarios conectados</h3>
                <span><a href="principal.php">página de juego</a></span>
            </div>
            <div id="espaciousu">
                <h3 class="titulos">Hola, <?php echo $_SESSION['user'] ?></h3>
            </div>
            
            <a href="desconexion.php"><img src="imagenes/barco-simple.png" class="barcosalida"></a> 
        </div>
    </body>
</html>

<?php
    }
    else{
	print 'no tengo sesion';
	header("Location:http://index.php");
    }
?>
