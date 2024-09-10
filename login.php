<?php

session_start();

$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPubli.php");
?>
    <?php
        if(isset($_COOKIE['nombre_usu']) && isset($_COOKIE['clave_usu'])){
            echo '<p class="mensaje_login">Nombre: ' . $_COOKIE['nombre_usu'] . ". Su última visita fue el: " . $_COOKIE['time_date'] . " a las " . $_COOKIE['time_hour'] . '<br><a href="comprobar.php" class="a_boton"> <input type="button" value="Acceder"></a> <a href="salir.php" class="a_boton"> <input type="button" value="Salir"> </a></p><br>';
        }else{
    ?>

        <main class="log_inv">
            <form name="form" class="form-l" method="POST" action="pag_control_acceso.php">
                <h2>Login</h2>
                <div class="nuev">
                    <label for="login">Login</label><input type="text" name="login" id="login">
                    <label for="pwd">Password</label><input type="password" name="pwd" id="pwd">
                    <input type="checkbox" name="guardar_clave" value="1"><p class="p-Recuerdame">Recuérdame</p>
                    <input type="submit" value="Login">
                </div>
            </form>


            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
            </div>

        </main>

        <?php
            }
        ?>

<?php
require_once("footer.php");
?>