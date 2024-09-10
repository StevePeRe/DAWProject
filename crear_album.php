<?php
$title = "Crear Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

    if(isset($_SESSION["viene_de_crear"]) && $_SESSION["viene_de_crear"]=="hola"){
            echo "<div id='msj-modal'>";
                echo '<article>
                    <h2>Álbum añadido correctamente</h2>
                    <p>¿Desea añadir una foto al álbum ahora?</p>
                    <a href="anadir_foto_album.php"><button>Sí</button></a>
                    <a href="index2.php"><button>No</button></a>
                    </article>';
            echo '</div>';
    }
    $_SESSION["viene_de_crear"] = "adios";

    if(isset($_SESSION["mal_titulo"]) && $_SESSION["mal_titulo"]=="hola"){
            echo "<div id='msj-modal'>";
                echo '<article>
                    <h2>Título erróneo</h2>
                    <p>Debes añadir algo en el titulo</p>
                    <a href="crear_album.php"><button>Cerrar</button></a>
                    </article>';
            echo '</div>';
    }
    $_SESSION["mal_titulo"] = "adios";

?>

        <main class="log_inv">
            <form name="form" class="form-l" method="POST" action="crear_album_control.php">
                <h2>Crear Álbum</h2>
                <div class="nuev">
                    <label>Título(*)</label><input type="text" name="tit" id="tit">
                    <label>Descripción</label><textarea name="descri" id="descri" cols="20" rows="5"></textarea>
                    <br>
                    <input type="submit" value="Crear">
                </div>
            </form>


            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
            </div>

        </main>

<?php
require_once("footer.php");
?>