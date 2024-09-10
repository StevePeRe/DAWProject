<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

    // Conecta con el servidor de MySQL
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
        // Ejecuta una sentencia SQL
        $sentencia = 'SELECT * from Fotos as f, Paises as p where f.Pais=p.IdPais order by FRegistro';
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

?>

     <div class="field">
                <input type="text"/>
                <button type="button"><a href="r_busqueda.php">Buscar</a></button>
            </div>

        <?php
            if(isset($_COOKIE["nombre_usu"])){
                echo "<h2>Bienvenid@, ". $_COOKIE["nombre_usu"] . ".</h2>";
            }

            if(isset($_SESSION["name"])){
                echo "<h2>Bienvenid@, ". $_SESSION["name"] . ".</h2>";
            }


            $idd = 0;
            $cont = 0;
        echo '<main class="margen-I"><section>';
            echo '<h2>Últimas fotos</h2>';
            echo '<div class="container1">';
        // Recorre el resultado y lo muestra en forma de tabla HTML
        while($fila = $resultado->fetch_assoc()) {
            $idd = $fila["IdFoto"];
            echo '<article>';
            echo '<a href="d_foto.php?id='.$idd.'">
                        <img src="' . $fila['Fichero'] . '" height="300" width="500" alt="">
                    </a>';
            echo '<a>
                        <h4>' . $fila['Titulo'] . '</h4>
                    </a>';
            echo '<p>
                        Fecha de creación: ' . $fila['Fecha'] . '<br>
                        País: ' . $fila['NomPais'] . '
                    </p>';
            echo '</article>';

            $cont = $cont + 1;
            if($cont==5){
                break;
            }

        }
            echo '</div>';
            echo '</section>';

        ?>
            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
            </div>

<?php
echo '</main>';
// Libera la memoria ocupada por el resultado
$resultado->close();
// Cierra la conexión
$mysqli->close();

require_once("footer.php");
?>