<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

if(isset($_SESSION["mal_tit"]) && $_SESSION["mal_tit"]=="hola"){
            echo "<div id='msj-modal'>";
                echo '<article>
                    <h2>Título/Texto alternativo erróneo</h2>
                    <p>Asegúrate de escribir un titulo, que el texto adicional tengo una longitud mayor a 10.</p>
                    <a href="anadir_foto_album.php"><button>Cerrar</button></a>
                    </article>';
            echo '</div>';
    }
    $_SESSION["mal_tit"] = "adios";

    if(isset($_SESSION["mal_text_a"]) && $_SESSION["mal_text_a"]=="hola"){
            echo "<div id='msj-modal'>";
                echo '<article>
                    <h2>Texto redundante</h2>
                    <p>Asegúrate de no escribir contenido redundante en el texto adicional, ejem; foto de, imagen de, texto de,...</p>
                    <a href="anadir_foto_album.php"><button>Cerrar</button></a>
                    </article>';
            echo '</div>';
    }
    $_SESSION['mal_text_a'] = "adios";

$mysqli = @new mysqli(
    'localhost',
    // El servidor
    'wwwdata',
    // El usuario
    'abc',
    // La contraseña
    'pibd'); // La base de datos

    if($mysqli->connect_errno) {
        echo '<p>Error al conectar con la base de datos: ' . $mysqli->connect_error;
        echo '</p>';
        exit;
    }

    if(isset($_COOKIE['id_album'])){
        $variable = $_COOKIE['id_album'];
        setcookie('id_album',$fila['IdAlbum'],time()-90*24*60*60);
    }else{
        $variable = $_GET['id'];
    }

    // Ejecuta una sentencia SQL
    $sentencia = "SELECT * FROM Paises";
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

    echo ' <main class="margen-mensj">
        <form class="form-anyadir" method="POST" action="anyadir_foto_control.php">
            <h2 class="busc">Añadir Foto a Álbum</h2>
            <div class="nuev">
                <label>Título(*) </label><input type="text" name="tit" id="tit"><br>
                <label>Descripción </label><input type="text" name="descri" id="descri"><br>
                <label>Fecha </label><input type="text" name="fecha" id="fecha"><br>
                <select name="Pais" id="Pais">
                <option selected value="0">Pais</option>';
                while($fila = $resultado->fetch_assoc()) {
                    echo '<article>
                        <option value = "$fila"> '.$fila['NomPais'].' </option>
                    </article>';
                }
           echo '<label for="">Foto de usuario </label><input type="file" name="imagen" id="imagen"><br>
           <label for="">Texto adicional</label><input type="text" name="text_alt" id="text_alt">
           <label for=""> Álbum al que se añade</label><input type="text" name="album" id="album" value="'.$variable.'">';
            echo '</select><br>
                <input type="submit" value="Añadir">
            </div>

        </form>
    </main>';

require_once("footer.php");
?>