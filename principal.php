<?php
    session_start();
    
    $conexion=mysql_connect("localhost","root","") or die ("no se puede conectar");
    mysql_select_db("barcos", $conexion) or die ("no se puede conectar");
    
    if(isset($_SESSION['user'])){
        
?>

<html>
    <head>
        <script type="text/javascript" src="script.js"></script>
        <link href="css/principal.css" rel="stylesheet" type="text/css" />
        <title>Barcas</title>
        <!--link rel="icon" type="image/ico" href="/imagenes/favicon.ico" /> -->
    </head>
    <body onload="tablero(); barcos();">
        <div id="contenedorp">
            <div id="tablero"></div> <!-- Aquí se genera el tablero de juego -->
            <div id="barcos"></div> <!-- Aquí se generan los barcos para arratrar -->
            <a href="desconexion.php"><img src="imagenes/barco-simple.png" class="barcosalida"></a>
        </div>
    </body>
</html>
<?php
        
    }
    else{
        
    }

?>