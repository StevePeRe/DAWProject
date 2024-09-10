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
        $sentencia = "SELECT * from Usuarios as a, Paises as p where a.IdUsuario='$id_usu' and a.Pais=p.IdPais";
        if(!($resultado = $mysqli->query($sentencia))) {
            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
            echo '</p>';
            exit;
        }
$idd = 0;
        echo '<main class="margen-I"><section>';
            echo '<div class="container2">';
        while($fila = $resultado->fetch_assoc()) {
            $idd = $fila['IdUsuario'];
            $foto_modificada = $fila['Foto'];
             echo '<main>
            <form class="form-r2" method="POST" action="form_registro_nuevo_u.php?id='.$idd.'">
                <h2 class="busc">Datos del usuario</h2>
                <div class="nuev">
                    <label for="">Nombre Usuario </label><input value="' . $fila['NomUsuario'] . '" type="text" name="login" id="login"> <br>

                    <label for="">Intoduce la contraseña actual para verificar</label><input type="password" name="password3" id="password3"><br>

                    <label for="">Nueva constraseña</label><input type="password" name="password" id="password"><br>

                    <label for="">Repite la nueva contraseña</label><input type="password" name="password2" id="password2"><br>

                    <label for="">Email </label><input value="' . $fila['Email'] . '" name="email" id="email"><br>

                    <label for="">Sexo </label>
                    <select name="Sexo" id="Sexo">
                        <option selected value="0">' . $fila['Sexo'] . '</option>
                        <option value="1">Femenino(1)</option>
                        <option value="0">Masculino(0)</option>
                        <option value="No especificado">Otros(2)</option>
                    </select><br>

                    <label for="">Fecha de nacimiento </label><input value="' . $fila['FNacimiento'] . '" name="date" id="date" onblur="Fecha1()"><br>

                    <label for="">Ciudad </label><input value="' . $fila['Ciudad'] . '" type="text" name="ciudad" id="ciudad"><br>

                    <label for="">País</label>
                    <select name="Pais" id="Pais">
                        <option selected value="0">' . $fila['NomPais'] . '</option>';
                        while($fila = $resultado->fetch_assoc()) {
                            echo '<article>
                                <option value = "$fila"> '.$fila['NomPais'].' </option>
                            </article>';
                        }

                    echo '</select><br>
                    <label for="">Imagen de usuario </label><img src="'.$foto_modificada.'" alt="no hay foto" width="200" height="150"><br>
                    <label for="">Foto de usuario </label><input value="' . $fila['Foto'] . '" type="file" name="imagen" id="imagen"><br>
                    <label for="">¿Deseas eliminar tu foto de perfil? </label><input type="checkbox" name="check" id="check"><br>
                    <br>

                    <input type="submit" value="Registrar">
                </div>
                <br><br><br><br>
            </form>

            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.php"></a>
            </div>

        </main>';


        }

        echo '</div>';
        echo '</section><br><br>';

 require_once("footer.php");
 ?>