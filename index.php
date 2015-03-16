<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="script.js"></script>
        <title>Barquitos</title>
    </head>
    <body onload="inici();">
        <div id="contenedor">
            <br/>
            <h1 class="titulos"> Bienvenido al mejor juego de barcos de la historia de barcos </h1>
            <div id="lista">
                <h3 class="titulos">Lista de usuarios conectados</h3>
                <?php
                    require_once './llistatUsuaris.php';
                ?>
            </div>
            <div>
                <div id="form">
                    <h3 class="titulos">Login</h3>
                    <form method=post action="login.php">
                        <span class="bloque">&nbsp; Introduce tu nick de usuario</span><span class="bloque2"> <input type="text" name="nick" placeholder="nick"></span><br />
                        <span class="bloque">&nbsp; Introduce tu contraseña</span><span class="bloque2"> <input type="password" name="password" placeholder="password"></span><br />
                        <div id="submit">
                            <br />
                            <input type=submit value="Entrar">&nbsp;<input type=reset value="Restablecer">
                        </div>
                    </form>
                </div>
                <div id="crearusu">
                    <h3 class="titulos">Crear usuario</h3>
                    <form method=post action="crearusuario.php">
                        <span class="bloque">&nbsp; Introduce tu nick de usuario</span><span class="bloque2"> <input type="text" name="cnick" placeholder="nick"></span><br />
                        <span class="bloque">&nbsp; Introduce tu contraseña</span><span class="bloque2"> <input type="password" name="cpassword" placeholder="password"></span><br />
                        <span class="bloque">&nbsp; Vuelve a escribir tu contraseña</span><span class="bloque2"> <input type="password" name="cpassword2" placeholder="password"></span><br />
                        <span class="bloque">&nbsp; <input type="checkbox" name="check" value="true"> &nbsp; He leído y acepto los terminos</span>
                    <div id="submit">
                        <br />
                        <input type=submit value="Crear usuario">&nbsp;<input type=reset value="Restablecer">
                    </div>
                    </form>
                    
                </div>
            </div>
            <center>
                <img src="imagenes/barco.png" id="barcop"/>
            </center>
            
        </div>
    </body>
</html>