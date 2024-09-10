<?php
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }
$idd = $_SESSION['id_usu'];
?>

        <main>
            <section class="op">
                <h2>Perfil</h2>
                    <?php
                        echo '<li><a href="perfil.php?id='.$idd.'">Mi Perfil</a></li>';
                    ?>
                    <li><a href="mis_datos.php">Modificar datos</a></li>
                    <li><a href="dar_baja.php">Dar de baja</a></li>
                    <li><a href="mis_albumes.php">Visualizar albumes</a></li>
                    <li><a href="crear_album.php">Crear album</a></li>
                    <li><a href="confi.php">Configuración</a></li>
                    <li><a href="s_album.php">Solicitar album impreso</a></li>
                    <li><a href="salir.php">Cerrar Sesión</a></li>
            </section>

            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.php"></a>
            </div>

        </main>


<?php
require_once("footer.php");
?>