<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

    echo '<h2>'. "Ver Álbum". '</h2>';

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

        $variable = $_GET['id'];
        $sentencia = "SELECT * from Fotos as f, Albumes as a, Paises where f.Album='$variable'";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

        $cont = 0;
    // Recorre el resultado y lo muestra en forma de tabla HTML
    while($fila = $resultado->fetch_assoc()) {
        $idd = $fila["IdFoto"];
            if($cont==0){
                echo '<article>';
                    echo '<a>
                        <h4> Descripción del álbum </h4>
                        <p>' . $fila['Descripcion'] . '</p>
                    </a>';
                echo '</article>';
                $cont = $cont + 1;
            }
            if($cont<3){
                echo '<article>';
                echo '<a href="d_foto.php?id='.$idd.'">
                    <img src="' . $fila['Fichero'] . '" height="300" width="500" alt="">
                    </a><br><br>';
                echo '<p>
                        Fecha de creación: ' . $fila['Fecha'] . '<br>
                        País: ' . $fila['NomPais'] . '
                    </p>';

                echo '</article>';
            }
            $cont = $cont + 1;
    }

require_once("footer.php");
?>