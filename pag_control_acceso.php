<?php

    session_start();

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
    $sentencia = 'SELECT * FROM Usuarios as u, Estilos as s where u.Estilo=s.IdEstilo';
    if(!($resultado = $mysqli->query($sentencia))) {
        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
        echo '</p>';
        exit;
    }

    $usu = false;
    $clave = false;

    if(!(isset($_COOKIE['nombre_usu']))){
        while($fila = $resultado->fetch_assoc()) {
            if($_REQUEST['login'] == $fila['NomUsuario']){
                $usu = true;
                $_SESSION['id_usu'] = $fila['IdUsuario'];
                $style = $fila['Fichero'];
            }
            if($_REQUEST['pwd'] == $fila['Clave']){
                $clave = true;
            }
        }

        if($usu == true && $clave == true){

            if($_POST['guardar_clave']=="1"){
                setcookie('nombre_usu',$_POST['login'],time()+90*24*60*60);
                setcookie('clave_usu',$_POST['pwd'],time()+90*24*60*60);
                setcookie('estilo1',$style,time()+90*24*60*60);
                setcookie('time_date',date('d/m/Y'),time()+90*24*60*60);
                setcookie('time_hour',date('H:i'),time()+90*24*60*60);
            }else{
                $_SESSION['name'] = $_POST['login'];
                $_SESSION['clave'] = $_POST['pwd'];
            }

            $_SESSION['correcto'] = true;
            header("Location: http://localhost/pcw/DAW7/index2.php");

        }else{
            $_SESSION['correcto'] = false;
            header("Location: http://localhost/pcw/DAW7/index.php");
        }

    }else{

        echo "Error, usuario ya iniciado.";

    }

?>