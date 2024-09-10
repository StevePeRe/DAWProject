<?php
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

    echo '<form class="" method="POST" action="confi2.php">
    <select name="Estilo" id="Estilo">
    <option selected value="0">Estilos a elegir</option>';
    echo '<article>
            <option value = "style_noche">Estilo noche</option>
            <option value = "style_contraste">Estilo alto contraste</option>
            <option value = "style_grande">Estilo letra grande</option>
            <option value = "style_acces">Estilo accesible</option>
            <option value = "style1">Estilo normal</option>
            </article>';
    echo '</select><input type="submit" value="Cambiar"></form>';



?>




<?php
require_once("footer.php");
?>