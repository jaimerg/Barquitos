<?php
    session_start();
    
    if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

        $host="localhost";
        $user="root";
        $password="";
        $database="barcos";
        $conexion = mysqli_connect($host, $user, $password, $database);

        $usuario = $_SESSION['user'];
        $pass = $_SESSION['pass'];
        $estado = 1;
        $sql = mysqli_query($conexion,"update usuarios set estado='".$estado."' where nick='".$usuario."' and password='".$pass."'");
        
        //  echo '<script>var nomUsuari ='.$_SESSION['user'].'</script>';
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="script.js"></script>
        <script>
        
        var myId="<?php echo $_SESSION['id']; ?>";</script>
        <title>Barquitos</title>
    </head>
    <body onload="inicio2()">
        <div id="contenedorpu">
            <br/>
            <h1 class="titulos"> Bienvenido al mejor juego de barcos de la historia de barcos </h1>
            <div id="lista2">
                <h2 class="titulos">Lista de usuarios conectados</h2>
                <div id="listalista2"></div>
                <span><a href="principal.php">página de juego</a></span>
                <button onclick="pidejugar()">Retar Juagdor</button>
                
            </div>
            
            <div id="espaciousu">
                <h2 class="titulos">Hola, <?php echo $_SESSION['user'] ?></h2><br>
                <?php
                    $consulta = mysqli_query($conexion,"select * from usuarios");
                    while ($registro = mysqli_fetch_array($consulta)) {
                        if ($registro['nick'] == $usuario) {
                            ?><html><h3>Partidas ganadas: <?php echo $registro['p_ganadas']; ?></h3></html><?php
                            ?><html><h3>Partidas perdidas: <?php echo $registro['p_perdidas']; ?></h3></html><?php
                            ?><html><h3>Partidas perdidas: <?php $final= $registro['p_ganadas']-$registro['p_perdidas']; echo $final; ?></h3></html><?php
                        }
                    }
                ?>
                <h3>Top 5:</h3>
                <h4><?php $consulta2 = mysqli_query($conexion,"SELECT nick, p_ganadas FROM usuarios order by p_ganadas desc LIMIT 5"); 
                while ($registro = mysqli_fetch_array($consulta2)) {
                    echo $registro[0]."  -  ".$registro[1]. "<br>";
                }
                ?></h4>
                
            </div>
            
            <a href="desconexion.php"><img src="imagenes/barco-simple.png" class="barcosalida"></a> 
        </div>
    </body>
</html>

<?php
    }
    else{
	print 'no tengo sesion';
	header("Location:index.php");
    }
?>
