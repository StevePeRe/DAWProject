<?php
$title = "Perfil P&I";
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
    $variable = $_GET['id'];
        if(intval($variable)<6){
            $sentencia = "SELECT * FROM Usuarios,Albumes where IdUsuario = '$variable' and Usuario='$variable'";
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
                                <img src="' . $fila['Foto'] . '" height="300" width="500" alt=""><br><br><br>
                                <p>Fecha de incorporación: '. $fila['FRegistro'] .'</p>';
                                echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
                                $cont = $cont + 1;
                }else{
                                echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
                    }
            }
                    echo '</article>';
                        echo '</div>';
        }else{
            $sentencia = "SELECT * FROM Usuarios where IdUsuario = '$variable'";
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
                                <img src="' . $fila['Foto'] . '" height="300" width="500" alt=""><br><br><br>
                                <p>Fecha de incorporación: '. $fila['FRegistro'] .'</p>';
                                echo '<li>Albúm: Sin album de momento</li>';
                                $cont = $cont + 1;
                }else{
                                echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
                    }
            }
                    echo '</article>';
                        echo '</div>';
        }
?>