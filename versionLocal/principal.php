<?php
session_start();
/*
$conexion = mysql_connect("localhost", "root", "") or die("no se puede conectar");
mysql_select_db("barcos", $conexion) or die("no se puede conectar");
$conexion=mysql_connect("mysql.hostinger.es","u883679537_usu","95826440") or die ("no se puede conectar");
    mysql_select_db("u883679537_1", $conexion) or die ("no se puede conectar");*/

$host="localhost";
$user="root";
$password="";
$database="barcos";/*
$host="mysql.hostinger.es";
$user="u883679537_usu";
$password="95826440";
$database="u883679537_1";*/


$conexion = mysqli_connect($host, $user, $password, $database);

if (isset($_SESSION['user'])) {
    ?>

    <html>
        <head>
            <script src="jquery-1.11.2.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="script.js"></script>
            <link href="css/principal.css" rel="stylesheet" type="text/css" />
            <title>Barcas</title>
            <!--link rel="icon" type="image/ico" href="/imagenes/favicon.ico" /> -->
        </head>
        <body onload="tablero(); barcos(); tablero2(); inicio3(); inicio4();">
            <div id="contenedorp">
                <table>
                    <tr>
                        <td><div id="tablero"></div> <!-- Aquí se genera el tablero de juego --></td>
                        <td><div id="tablero2"></div> <!-- Aquí se genera el tablero de los disparos --></td>
                    </tr>
                    <tr>
                        <td><div id="barcos"></div> <!-- Aquí se generan los barcos para arratrar --></td>
                        <td id="turnos"><span>Dale listo para jugar</span><input type="checkbox" id="listo"><button id="jugar" onclick="jugar();">Jugar</button></td>                    
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