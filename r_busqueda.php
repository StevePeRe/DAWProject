<?php
    session_start();

        if(isset($_COOKIE['nombre_usu']) || isset($_SESSION['name'])){
            $title = "Resultados de Busqueda Album P&I";
            require_once("cabecera.php");
            require_once("menuPri.php");


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
        $variable_t = $_POST['tit'];
        $variable_f= $_POST['fecha'];
        $variable_p = $_POST['pais'];

        $sentencia = "SELECT * FROM Fotos WHERE Titulo like '%$variable_t%' and Fecha like '%$variable_f%' and (Pais = '$variable_p')";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }

        // Recorre el resultado y lo muestra en forma de tabla HTML
        while($fila = $resultado->fetch_assoc()) {
            echo '<article>';
            echo '<a href="d_foto.php">
                    <img src="' . $fila['Fichero'] . '" height="300" width="500" alt="">
                </a>';
            echo '<a>
                    <h4>' . $fila['Titulo'] . '</h4>
                </a>';
            echo '<p>
                    Fecha de creación: ' . $fila['Fecha'] . '<br>
                    País: ' . $fila['Pais'] . '<br>
                </p>';

            echo '</article>';
        }

        require_once("footer.php");

    }else{
        $title = "Resultados de Busqueda Album P&I";
        require_once("cabecera.php");
        require_once("menuPubli.php");
        require_once("footer.php");
    }
?>