<?php

session_start();

if(strlen($_POST['text_alt'])>9){
    $bool = true;
    $partes = explode(" ",$_POST['text_alt']);
    if($partes[0]=="texto" || $partes[0]=="imagen" || $partes[0]=="foto"
        || $_POST['text_alt']=="texto" || $_POST['text_alt']=="imagen" || $_POST['text_alt']=="foto"){
        $bool2 = true;
    }else{
        $bool2 = false;
    }

}else{
    $bool = false;
}

/*
if($bool2==true){ pasadp
        $_SESSION['mal_text_a'] = "hola";
        header("Location: http://localhost/pcw/DAW7/anadir_foto_album.php");
    }*/

if(!(empty($_POST['tit'])) && $bool==true){

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
    $fecha = $_POST['fecha'];
    $imag = "Fotos/".$_POST['imagen'];
    $pais = $_POST['Pais'];
    $text_a = $_POST['text_alt'];
    $alb = $_POST['album'];
    $date_r = date('Y-m-d H:i:s');
    $idd = $_SESSION['id_usu'];

    $sentencia = "INSERT INTO Fotos(Titulo,Descripcion,Fecha,Pais,Album,Fichero,Alternativo,FRegistro) values('$titu','$descrip','$fecha',2,$alb,'$imag','$text_a','$date_r')";

    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }else{
        // $_SESSION['viene_de_crear'] = "hola";
         header("Location: http://localhost/pcw/DAW7/index2.php");
    }
}else{

    $_SESSION['mal_tit'] = "hola";
    header("Location: http://localhost/pcw/DAW7/anadir_foto_album.php");

}


?>