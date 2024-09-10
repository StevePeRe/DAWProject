<?php
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPri.php");

    if(!(isset($_COOKIE["nombre_usu"])) && !(isset($_SESSION["name"]))){

        header("Location: http://localhost/pcw/DAW7/mensaje_error.php");

    }

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

    $nom = $_POST['nom'];
    $titu = $_POST['tit'];
    $descrip = $_POST['text_a'];
    $ema = $_POST['ema'];
    $fecha = $_POST['fecha'];

    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $cp = $_POST['cp'];
    $localidad = $_POST['Localidad'];
    $provincia = $_POST['Provincia'];
    $pais = 2;//$_POST['Pais'];
    $direcc_total = $calle . "," . $numero . "," . $piso . "," . $puerta . "," . $cp . "," . $localidad . "," . $provincia . "," . $pais;


    $color = $_POST['color'];
    $copia = $_POST['copia'];
    $resolucion = $_POST['resolucion'];
    $date_r = date('Y-m-d H:i:s');
    $fecha = $_POST['fecha'];
    $albumes = 2;//$_POST['albumes'];
    $color_o_no = $_POST['color_o_no'];
    $coste = 2;
    $idd = $_SESSION['id_usu'];

    if($color_o_no == ""){
        $sentencia = "INSERT INTO Solicitudes(Album,Nombre,Titulo,Descripcion,Email,Direccion,Color,Copias,Resolucion,Fecha,IColor,FRegistro,Coste) values($albumes,'$nom','$titu','$_descrip','$ema','$direcc_total','$color',$copia,'$resolucion','$fecha',0,'$date_r','$coste')";
    }else{
        $sentencia = "INSERT INTO Solicitudes(Album,Nombre,Titulo,Descripcion,Email,Direccion,Color,Copias,Resolucion,Fecha,IColor,FRegistro,Coste) values($albumes,'$nom','$titu','$_descrip','$ema','$direcc_total','$color',$copia,'$resolucion','$fecha',1,'$date_r','$coste')";
    }

    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

?>

        <main class="margen-mensj">
            <section>
                <h2 class="esp">La solicitud ha sido procesada correctamente</h2>

                <article class="cent">
                    <?php
                        echo '<p>Nombre: '.$nom.'</p>';
                        echo '<p>Titulo del album: '.$titu.'</p>';
                        echo '<p>Texto adicional: '.$descrip.'</p>';
                        echo '<p>Color de la portada <input type="color" value"'.$color.'" readonly></p>';
                        echo '<p>Numero de copia: '.$copia.'</p>';
                        echo '<p>Precio: '.$coste.'€</p>';
                    ?>
                </article>

            </section>

            <div class="copy">
                &copy;
                <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
            </div>

        </main>

<?php
require_once("footer.php");
?>