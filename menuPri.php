<?php
    session_start();
?>

<body>

        <header>
            <h1> Pictures & Images </h1>
            <!--
            <form action="index2.php" method="POST">
                <select name="estilo">
                    <option value="style1">Normal</option>
                    <option value="style_noche">Modo Noche</option>
                    <option value="style_contraste">Alto contraste</option>
                    <option value="style_grande">Letra Grande</option>
                    <option value="style_acces">Modo Accesibilidad</option>
                </select>
                <input type="submit" value="Cambiar estilo">
            </form> -->

            <!--Menú-->
            <nav>
                <li><a href="index2.php">Inicio</a></li>
                <li><a href="u_registrado.php">Perfil: <?php if(isset($_COOKIE['nombre_usu'])){echo($_COOKIE['nombre_usu']);}else{echo($_SESSION['name']);}  ?> </a></li>
                <li><a href="f_busqueda.php">Buscador</a></li>
                <li><a href="index2.php">Subir Foto</a></li>
                <li><a href="salir.php">Salir</a></li>
            </nav>
        </header>