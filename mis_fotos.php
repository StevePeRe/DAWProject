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
        $sentencia = "SELECT * from Albumes as a, Fotos as f,Paises as p where a.Usuario='$id_usu' and a.IdAlbum=f.Album and f.Pais=p.IdPais";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
        echo '<main class="margen-I"><section>';
            echo '<h2>Fotos del usuario</h2>';
            echo '<div class="container2">';
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
                        País: ' . $fila['NomPais'] . '<br>
                        Álbum: ' . $fila['IdAlbum'] . '
                    </p>';
            echo '</article>';
        }
         echo '</div>';
            echo '</section>';
            echo '</main>';



 require_once("footer.php");
 ?>