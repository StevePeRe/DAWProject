<?php

    session_start();

    session_destroy();

    if(isset($_COOKIE['nombre_usu']) && isset($_COOKIE['clave_usu']) || isset($_SESSION['name']) && isset($_SESSION['clave'])){

        setcookie('nombre_usu',$_POST['login'],time()-90*24*60*60);
        setcookie('clave_usu',$_POST['pwd'],time()-90*24*60*60);
        setcookie('estilo1',"style_noche",time()-90*24*60*60);
        setcookie('estilo2',$_POST['Estilo'],time()-90*24*60*60);

        header("Location: http://localhost/pcw/DAW7/login.php");

    }else{

        echo "Ha habido un error.";

    }
?>