<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

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
        /*echo '<p> Id:' . $_SESSION["id_usu"] . '</p>';*/
        $id_usu = $_SESSION["id_usu"];
        $sentencia = "SELECT * from Albumes as a where a.Usuario='$id_usu'";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

        echo '<main class="margen-I"><section>';
            echo '<h2>Álbumes del usuario</h2>';
            echo '<a class="boton_fotos" href="mis_fotos.php"><h4>Mis fotos</h4></a>';
            echo '<div class="container2">';
        while($fila = $resultado->fetch_assoc()) {
            $idd = $fila["IdAlbum"];
            echo '<article>';
            echo '<a>
                        <a href="ver_albumPri.php?id='.$idd.'"><h3>Álbum: ' . $fila['IdAlbum'] . '</a></h3>
                    </a>';
            echo '<a>
                        <h4>' . $fila['Titulo'] . '</h4>
                    </a>';
            echo '<p>
                        Descripción: ' . $fila['Descripcion'] . '<br>
                    </p>';
            echo '</article>';
        }
         echo '</div>';
            echo '</section>';

            echo '</main>';



 require_once("footer.php");
 ?>