<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");



?>

    <main>
        <section class="center">
            <h2>Contraseña incorrecta, vuelve a intentarlo.</h2>
            <a href="dar_baja.php"><button>Volver</button></a>
        </section>


        <div class="copy">
            &copy;
            <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
        </div>

    </main>

<?php


require_once("footer.php");
?>