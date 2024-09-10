<?php

session_start();

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
    $idd = $_SESSION['id_usu'];

    $sentencia = "DELETE FROM Usuarios where IdUsuario = '$idd'";

    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }else{

        header("Location: http://localhost/pcw/DAW7/salir.php");
    }

?>