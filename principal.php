<?php
session_start();

$conexion = mysql_connect("localhost", "root", "") or die("no se puede conectar");
mysql_select_db("barcos", $conexion) or die("no se puede conectar");

if (isset($_SESSION['user'])) {
    ?>

    <html>
        <head>
            <script type="text/javascript" src="script.js"></script>
            <link href="css/principal.css" rel="stylesheet" type="text/css" />
            <title>Barcas</title>
            <!--link rel="icon" type="image/ico" href="/imagenes/favicon.ico" /> -->
        </head>
        <body onload="tablero(); barcos(); tablero2();">
            <div id="contenedorp">
                <table>
                    <tr>
                        <td><div id="tablero"></div> <!-- Aquí se genera el tablero de juego --></td>
                        <td><div id="tablero2"></div> <!-- Aquí se genera el tablero de los disparos --></td>
                    </tr>
                    <tr>
                        <td><div id="barcos"></div> <!-- Aquí se generan los barcos para arratrar --></td>
                        <td><span>Dale listo para jugar</span><input type="checkbox" id="listo"><button id="jugar" onclick="jugar();">Jugar</button></td>                    
                    </tr>
                </table>
               
                <a href="desconexion.php"><img src="imagenes/barco-simple.png" class="barcosalida"></a>
            </div>
        </body>
    </html>
    <?php
} else {
    
}
?>