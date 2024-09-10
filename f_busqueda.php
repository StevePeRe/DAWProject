<?php
    session_start();

    if(isset($_COOKIE['nombre_usu']) || isset($_SESSION['name'])){
        $title = "Formulario de Busqueda Album P&I";
        require_once("cabecera.php");
        require_once("menuPri.php");
    }else{
        $title = "Formulario de Busqueda Album P&I";
        require_once("cabecera.php");
        require_once("menuPubli.php");
    }

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
    $sentencia = "SELECT * FROM Paises";
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

    echo ' <main class="margen-mensj">
        <form class="form-b" method="POST" action="r_busqueda.php">
            <h2 class="busc">Buscar por:</h2>
            <div class="nuev">
                <label>Título </label><input type="text" name="tit" id="tit"><br>
                <label>Fecha </label><input type="text" name="fecha" id="fecha"><br>
                <select name="pais" id="pais">
                <option selected value="0">Pais</option>';
                while($fila = $resultado->fetch_assoc()) {
                    echo '<article>
                            <option value = "'.$fila['IdPais'].'"> '.$fila['NomPais'].' </option>
                         </article>';
                }

            echo '</select><br>
                <input type="submit" value="Buscar">
            </div>

        </form>
    </main>';

    require_once("footer.php");
?>