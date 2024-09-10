<!-- redireccionar a index2.php -->

<?php
    session_start();

    $usu1 = 'Steeven';
    $usu2 = 'Pepe';
    $usu3 = 'Gema';
    $usu4 = 'Maria';

    $pwd1 = 'hola';
    $pwd2 = 'hola123';
    $pwd3 = '123hola';
    $pwd4 = 'hello';

    if($_COOKIE['nombre_usu'] == $usu1 && $_COOKIE['clave_usu'] == $pwd1){
        header("Location: http://localhost/pcw/DAW7/index2.php");
    }

    if($_COOKIE['nombre_usu'] == $usu2 && $_COOKIE['clave_usu'] == $pwd2){
        header("Location: http://localhost/pcw/DAW7/index2.php");
    }

    if($_COOKIE['nombre_usu'] == $usu3 && $_COOKIE['clave_usu'] == $pwd3){
        header("Location: http://localhost/pcw/DAW7/index2.php");
    }

    if($_COOKIE['nombre_usu'] == $usu4 && $_COOKIE['clave_usu'] == $pwd4){
        header("Location: http://localhost/pcw/DAW7/index2.php");
    }



?>