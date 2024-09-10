<?php

session_start();

    if(!(empty($_POST['tit']))){

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
        $titu = $_POST['tit'];
        $descrip = $_POST['descri'];
        $idd = $_SESSION['id_usu'];

        $sentencia = "INSERT INTO Albumes(Titulo,Descripcion,Usuario) values('$titu','$descrip','$idd')";

        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }else{
            $_SESSION['viene_de_crear'] = "hola";

            $sentencia = "SELECT * FROM Albumes where Titulo='$titu' and Descripcion='$descrip'";

            if(!($resultado = $mysqli->query($sentencia))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                echo '</p>';
                exit;
            }else{
                while($fila = $resultado->fetch_assoc()) {
                    setcookie('id_album',$fila['IdAlbum'],time()+90*24*60*60);
                }
            }

            header("Location: http://localhost/pcw/DAW7/crear_album.php");
        }

    }else{

        $_SESSION['mal_titulo'] = "hola";
        header("Location: http://localhost/pcw/DAW7/crear_album.php");

    }

?>