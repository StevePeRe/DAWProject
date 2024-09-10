<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

    echo '<h2>'. "Detalle de foto". '</h2>';

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
        $sentencia = "SELECT * FROM Fotos,Usuarios,Paises WHERE IdFoto = '$variable' and IdUsuario = '$variable' and IdPais = '$variable'";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

    // Recorre el resultado y lo muestra en forma de tabla HTML
    while($fila = $resultado->fetch_assoc()) {
        $idd = $fila["Album"];
            echo '<article>';
            echo '<a href="">
                <img src="' . $fila['Fichero'] . '" height="300" width="500" alt="">
                </a>';
            echo '<a>
                    <h4>' . $fila['Titulo'] . '</h4>
                </a>';
            echo '<p>
                    Descripción: ' . $fila['Descripcion'] . '<br>
                    Fecha de creación: ' . $fila['Fecha'] . '<br>
                    País: ' . $fila['NomPais'] . '<br>
                    Album: <a href="ver_albumPubli.php?id='.$idd.'">' . $fila['Album'] . '</a><br>
                    Usuario: <a href="perfil.php?id='.$idd.'">' . $fila['NomUsuario'] . '</a>
                </p>';

            echo '</article>';
    }

require_once("footer.php");
?>