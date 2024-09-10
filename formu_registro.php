<?php
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


    echo '<main>
            <form class="form-r" method="POST" action="form_registro_nuevo_u.php">
                <h2 class="busc">Formulario de Registro</h2>
                <div class="nuev">
                    <label for="">Nombre Usuario </label><input type="text" name="login" id="login"> <br>

                    <label for="">Password </label><input type="password" name="password" id="password"><br>

                    <label for="">Repite password </label><input type="password" name="password2" id="password2"><br>

                    <label for="">Email </label><input name="email" id="email"><br>

                    <select name="Sexo" id="Sexo">
                        <option selected value="-1">Sexo</option>
                        <option value="1">Femenino</option>
                        <option value="0">Masculino</option>
                        <option value="2">Otros</option>
                    </select><br>

                    <label for="">Fecha de nacimiento </label><input name="date" id="date"><br>

                    <select name="Pais" id="Pais">
                        <option selected value="0">Pais de residencia</option>';
                        while($fila = $resultado->fetch_assoc()) {
                            echo '<article>
                                <option value = "'.$fila['NomPais'].'"> '.$fila['NomPais'].' </option>
                            </article>';
                        }

                    echo '</select><br>

                    <label for="">Ciudad </label><input type="text" name="ciudad" id="ciudad"><br>

                    <label for="">Foto de usuario </label><input type="file" name="imagen" id="imagen"><br>
                    <br>

                    <input type="submit" value="Registrar">
                </div>
            </form>

            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.php"></a>
            </div>

        </main>';

?>