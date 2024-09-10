<?php
session_start();
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPubli.php");

 ?>
    <div class="field">
                <input type="text"/>
                <button type="button"><a href="r_busqueda.php">Buscar</a></button>
            </div>

<?php
if(isset($_SESSION['correcto'])){

    echo "<div id='msj-modal'>";
            echo '<article>
                    <h2>Usuario incorrecto</h2>
                    <p>El usuario que has ingresado o la contraseña no están en nuestra base de datos, inténtalo de nuevo.</p>
                    <a href="login.php"><button>Cerrar</button></a>
                    </article>';
            echo '</div>';

}else{
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
        $sentencia = 'SELECT * from Fotos as f, Paises as p where f.Pais=p.IdPais order by FRegistro desc';
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
            $cont = 0;
            echo '<main class="margen-I"><section>';
            echo '<h2>Últimas fotos</h2>';
            echo '<div class="container1">';
        // Recorre el resultado y lo muestra en forma de tabla HTML
        while($fila = $resultado->fetch_assoc()) {
            echo '<article>';
            echo '<a href="mensaje_error.php">
                        <img src="' . $fila['Fichero'] . '" height="300" width="500" alt="'.$fila['Alternativo'].'">
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
            echo '</main>';
            // Libera la memoria ocupada por el resultado
            $resultado->close();
            // Cierra la conexión
            $mysqli->close();

    require_once("footer.php");
}
?>
