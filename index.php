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
            <div id="top">
                <div id="top1">
                    <h1 class="titulos"> Bienvenido al mejor juego de barcos de la historia de barcos </h1>
                </div>
                <div id="top2">
                    
                    <form method=post action="login.php">
                        <span id="hijo">
                        Nick<span> <input type="text" name="nick" placeholder="nick" class="inp" width="100px"></span>&nbsp;
                        Contraseña<span> <input type="password" name="password" placeholder="password" class="inp"></span>&nbsp;
                        <input type=submit value="Entrar">
                        </span>
                    </form>
                    
                </div>
            </div>
            <br/>
            
            <div id="lista">
                <h3 class="titulos">Lista de usuarios conectados</h3>
                <?php //require_once './llistatUsuaris.php'; ?>
                <div id="listalista">hola</div>
            </div>
            <div>
                <div id="form">
                    <h2 class="titulos">Login</h2>
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
                    <h2 class="titulos">Crear usuario</h2>
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
            <!--
            <center>
                <img src="imagenes/barco.png" id="barcop"/>
                <div id="usus" style="background-color: chartreuse;"></div>
            </center>
            -->
        </div>
    </body>
</html>