<?php
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }
    $idd = $_SESSION['id_usu'];

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
    $id_usu = $_SESSION['id_usu'];
    $sentencia = "SELECT * FROM Albumes where Usuario='$id_usu'";
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }
    echo '<main><section>';
            echo '<h2>Álbumes del usuario</h2>';
            echo '<div class="container2">';
            echo '<ol>';
     while($fila = $resultado->fetch_assoc()) {
            echo '<li>Albúm: '. $fila['IdAlbum'] .'</li>';
     }
     echo '</ol>';
      echo '</div>';
?>
                <h2 id="hola">Solicitud de albúm</h2>
                <article>
                <h4 class="cent">Descripcion</h4>
                <p class="cent">.............................</p>
                </article>

                <article class="break2">
                    <h4 class="tar"> Tarifas </h4>
                    <table>
                        <tr>
                            <th> Concepto </th>
                            <th> Tarifa </th>
                        </tr>
                        <tr>
                            <td> menos de 5 páginas </td>
                            <td> 0.10Є por pág. </td>
                        </tr>
                        <tr>
                            <td> entre 5 y 11 págs </td>
                            <td> 0.08Є por pág. </td>
                        </tr>
                        <tr>
                            <td> más de 11 págs </td>
                            <td> 0.07Є por pág. </td>
                        </tr>
                        <tr>
                            <td> blanco y negro </td>
                            <td> 0Є </td>
                        </tr>
                        <tr>
                            <td> color </td>
                            <td> 0.05Є por foto. </td>
                        </tr>
                        <tr>
                            <td> resolución mas de 300dpi </td>
                            <td> 0.02Є por foto. </td>
                        </tr>
                    </table>
                </article>

                <?php
                    $cantFila=17;
                    $cantColumna=6;

                    echo "<table border=2>";
                        for($fila=0;$fila<$cantFila; $fila++){
                            echo"<tr>";
                            for($col=0; $col<$cantColumna; $col++){
                                if(($fila==0 && $col==0) || ($fila==0 && $col==1)){
                                    echo "<td> </td>";
                                }else if(($fila==0 && $col==2) || ($fila==0 && $col==3)){
                                    echo "<td> Blanco y Negro </td>";
                                }else if(($fila==0 && $col==4) || ($fila==0 && $col==5)){
                                    echo "<td> Color </td>";
                                }
                                if(($fila==1 && $col==0)){
                                    echo "<td> Número de páginas </td>";
                                }
                                if(($fila==1 && $col==1)){
                                    echo "<td> Número de fotos </td>";
                                }
                                if(($fila==1 && $col==2) || ($fila==1 && $col==4)){
                                    echo "<td> 150-300 dpi </td>";
                                }
                                if(($fila==1 && $col==3) || ($fila==1 && $col==5)){
                                    echo "<td> 450-900 dpi </td>";
                                }
                                if($col==0 && ($fila>1 && $fila<17)){
                                    $a = 0;
                                    $a = $fila - 1;
                                    echo "<td> $a </td>";
                                }
                                if($col==1 && ($fila<17 && $fila>1)){
                                    $b = 0;
                                    $b = ($fila * 3)-3;
                                    echo "<td> $b </td>";
                                }
                                if($col==2 && ($fila<6 && $fila>1)){
                                    $c = ($fila-1) * 0.1;
                                    echo "<td> $c </td>";
                                }
                                if($col==2 && ($fila<13 && $fila>5)){
                                    $c = $fila * 0.08;
                                    echo "<td> $c </td>";
                                }
                                if($col==2 && ($fila<17 && $fila>12)){
                                    $c = $fila * 0.07;
                                    echo "<td> $c </td>";
                                }
                                if($col==3 && ($fila<6 && $fila>1)){
                                    $c = (($fila-1) * 0.10) + ((($fila * 3)-3) * 0.02);
                                    echo "<td> $c </td>";
                                }
                                if($col==3 && ($fila<13 && $fila>5)){
                                    $c = ($fila * 0.08) + ((($fila * 3)-3) * 0.02);
                                    echo "<td> $c </td>";
                                }
                                if($col==3 && ($fila<17 && $fila>12)){
                                    $c = ($fila * 0.07) + ((($fila * 3)-3) * 0.02);
                                    echo "<td> $c </td>";
                                }
                                if($col==4 && ($fila<6 && $fila>1)){
                                    $c = (($fila-1) * 0.10) + ((($fila * 3)-3) * 0.05);
                                    echo "<td> $c </td>";
                                }
                                if($col==4 && ($fila<13 && $fila>5)){
                                    $c = ($fila * 0.08) + ((($fila * 3)-3) * 0.05);
                                    echo "<td> $c </td>";
                                }
                                if($col==4 && ($fila<17 && $fila>12)){
                                    $c = ($fila * 0.07) + ((($fila * 3)-3) * 0.05);
                                    echo "<td> $c </td>";
                                }
                                if($col==5 && ($fila<6 && $fila>1)){
                                    $c = (($fila-1) * 0.10) + ((($fila * 3)-3) * 0.07);
                                    echo "<td> $c </td>";
                                }
                                if($col==5 && ($fila<13 && $fila>5)){
                                    $c = ($fila * 0.08) + ((($fila * 3)-3) * 0.07);
                                    echo "<td> $c </td>";
                                }
                                if($col==5 && ($fila<17 && $fila>12)){
                                    $c = ($fila * 0.07) + ((($fila * 3)-3) * 0.07);
                                    echo "<td> $c </td>";
                                }
                            }
                            echo "</tr>";
                        }
                    echo "</table>";

                    $sentencia = "SELECT * FROM Paises";
                    if(!($resultado = $mysqli->query($sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                        echo '</p>';
                        exit;
                    }

                ?>

                <!--<div id="sec123" class="sec123">

                --> <!-- Tabla generada en java script -->  <!--

                </div> -->

                <form class="form-s" method="POST" action="c_s_album.php">

                    <h2 class="busc">Solicitar Album</h2>
                    <div class="nuev">
                        <label for="">Nombre (*)</label><input type="text" name="nom" id="nom" maxlength="200" required>
                        <label for="">Titulo del album (*)</label><input type="text" name="tit" id="tit" maxlength="200" required>
                        <label for="">Texto adicional</label><input type="text" name="text_a" id="text_a" maxlength="4000">
                        <label for="">Correo electronico (*)</label><input type="email" name="ema" id="ema" required>

                        <h3>Dirección</h3>
                        <label for="">Calle (*)</label><input type="text" name="calle" id="calle" required>
                        <label for="">Numero (*)</label><input type="tel" name="numero" id="numero" required>
                        <label for="">Piso (*)</label><input type="text" name="piso" id="piso" required>
                        <label for="">Puerta (*)</label><input type="text" name="puerta" id="puerta" required>
                        <label for="">CP (*)</label><input type="text" name="cp" id="cp" required>

                        <h5>Localidad (*)</h5>
                        <select class="sleect1" name="Localidad" id="Localidad" required>
                            <option selected>Localidad</option>
                            <option value="Alicante">Alicante</option>
                            <option value="Valencia">Valencia</option>
                            <option value="Barcelona">Barcelona</option>
                        </select>

                        <h5>Provincia (*)</h5>
                        <select class="sleect1" name="Provincia" id="Provincia" required>
                            <option selected>Provincia</option>
                            <option value="Alicante">Alicante</option>
                            <option value="Valencia">Valencia</option>
                            <option value="Barcelona">Barcelona</option>
                        </select>

                        <?php
                        echo '<h5>Pais (*)</h5>
                        <select class="sleect1" name="Pais" id="Pais" required>
                            <option selected>Pais</option>';
                            while($fila = $resultado->fetch_assoc()) {
                                echo '<article>
                                    <option value = ""> '.$fila['NomPais'].' </option>
                                </article>';
                            }
                        echo '</select>';
                        ?>
                        <label for="">Telefono</label><input type="text" name="tel" id="tel">
                        <label for="">Color de la portada</label><input type="color" name="color" id="color">
                        <label for="">Numero de copia</label><input type="number" name="copia" id="copia" value="1" min="0">

                        <h3>Resolución de las fotos (*)</h3>
                        <select class="sleect1" name="resolucion" id="resolucion" required>
                            <option selected value="150">150 dpi</option>
                            <option value="300">300 dpi</option>
                            <option value="900">900 dpi</option>
                        </select>

                        <?php

                        $sentencia = "SELECT * FROM Albumes as a, Usuarios as u where u.IdUsuario='$idd'";
                        if(!($resultado = $mysqli->query($sentencia))) {
                            echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                            echo '</p>';
                            exit;
                        }

                        echo '<h3>Álbum de PI (*)</h3>
                        <select class="sleect1" name="albumes" id="albumes" required>
                            <option selected>mis albumes</option>';
                            while($fila = $resultado->fetch_assoc()) {
                                echo '<article>
                                    <option value = ""> '.$fila['Titulo'].' </option>
                                </article>';
                            }
                         echo '</select>';
                        ?>
                        <label for="">Fecha de recepcion</label><input type="date" name="fecha" id="fecha">

                        <h3>Impresión a color?
                            <input type="checkbox" name="color_o_no" id="color_o_no">
                        </h3>
                        <input type="submit" value="Solicitar">
                    </div>
                </form>

            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
            </div>


<?php

    echo '</section>';
    echo '</main>';
require_once("footer.php");
?>