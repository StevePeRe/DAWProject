<?php

session_start();

$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");
?>
    <?php
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
    $sentencia = "SELECT * FROM Usuarios as u,Albumes as a,Fotos as f where u.IdUsuario = '$idd' and a.Usuario='$idd' and f.Album=a.IdAlbum";

    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

    $cont=0;
            echo '<div class="todo_perfil">';
                echo '<article>';
    while($fila = $resultado->fetch_assoc()) {
        if($cont==0){
                    echo '<h2>Nombre: ' . $fila['NomUsuario'] . '</h2>
                        <img src="' . $fila['Foto'] . '" height="300" width="500" alt=""><br><br>';
                        echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
                        $cont = $cont + 1;
        }else{
                        echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
            }
    }
    echo "<br><br>";
        echo '<form name="form"  method="POST" action="baja_control.php">';
            echo '<label for="Contraseña">Contraseña </label><input type="password" name="contra" id="contra"><br><br>';
            echo '<input type="submit" value="Confirmar"></form>';

            echo '</article>';
                echo '</div>';

    ?>


<?php
require_once("footer.php");
?>