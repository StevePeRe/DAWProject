<?php
$title = "Confirmacion Solicitud Album P&I";
require_once("cabecera.php");
require_once("menuPubli.php");
?>

    <main>

        <?php

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



        $var1 = 0;
        $var2 = 0;

             if(strlen($_REQUEST['login']) == 0 || strlen($_REQUEST['password']) == 0){

                $var1 = 1;
                echo "<h4>Debes escribir algo en el login o contraseña.</h4>";

            }
            if($_REQUEST['password'] != $_REQUEST['password2']){

                $var2 = 1;
                echo "<h4>Las contraseñas deben coincidir.</h4>";
                /*echo '<script language="javascript">alert("Las contraseñas deben coincidir.");</script>';*/

            }

            //Parte del modificar perfil
            if($_POST['password3']!=null){

                $idd = $_GET['id'];

                $sentencia = "SELECT * FROM Usuarios where IdUsuario = '$idd'";
                if(!($resultado = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }
                 while($fila = $resultado->fetch_assoc()) {

                    if($_POST['password3']!=$fila['Clave']) {
                        header("Location: http://localhost/pcw/DAW7/mis_datos.php");
                    }else{

                        if($var1 == 1 || $var2 == 1){
                    echo '<a href="registro.php">Volver a registro.</a>';
                        }else{
                        /* Modificar */
                        $p1="/^[0-9a-zA-Z\t]+$/";
                        if(preg_match($p1,$_POST['login']) && strlen($_REQUEST['login'])>=3 && strlen($_REQUEST['login'])<=15 && substr($_REQUEST['login'],0,1)!=0 && substr($_REQUEST['login'],0,1)!=1 && substr($_REQUEST['login'],0,1)!=2
                            && substr($_REQUEST['login'],0,1)!=3 && substr($_REQUEST['login'],0,1)!=4 && substr($_REQUEST['login'],0,1)!=5 && substr($_REQUEST['login'],0,1)!=6 && substr($_REQUEST['login'],0,1)!=7 && substr($_REQUEST['login'],0,1)!=8
                                && substr($_REQUEST['login'],0,1)!=9){
                            // echo "<h4>bien</h4>";
                        }else{
                            echo "<h5>Has escrito mal el login.</h5>";
                        }

                        /* Clave */
                        $p2="/^(?=.[a-z])(?=.*\d)[a-zA-Z\d]+$/";
                        if(preg_match($p2,$_POST['password']) && strlen($_REQUEST['password'])>=6 && strlen($_REQUEST['password'])<=15){
                            // echo "<h4>bien</h4>";
                        }else{
                            echo "<h5>Has escrito mal la contraseña.</h5>";
                        }

                        /* Email */

                        $p2="/^([a-zA-Z0-9])+([a-zA-Z0-9.-])*@([a-zA-Z0-9-])+([a-zA-Z0-9._-]+)+$/";
                        if(preg_match($p2,$_POST['email']) && strlen($_POST['email'])>0 && strlen($_POST['email'])<254){
                            // echo "<h4>bien</h4>";
                            $partes = explode("@",$_POST['email']);
                            // echo "<h4>". $partes[0] ."</h4>";

                            if(strlen($partes[0])<255 && substr($_REQUEST['email'],strlen($partes[0])-1,1)!="."){
                                // echo "<h4>bien</h4>";
                                $cont=0;
                                for ($i=0; $i < strlen($partes[0]); $i++) {

                                    if(substr($_REQUEST['email'],$i,1)=="."){
                                        // $cont=$cont+1;echo "<h4>bien</h4>";
                                        if($cont>=2){
                                            break;
                                        }
                                    }else{
                                        $cont=0;
                                    }
                                }

                                if($cont>=2){
                                    echo "<h5>Demasiados puntos seguidos en la parte-local2 .".$cont."</h5>";
                                }else{
                                    // echo "<h4>bien3 ".$cont."</h4>";
                                }



                            }else{
                                echo "<h5>Has escrito mal la parte-local.</h5>";
                            }
                            $dominios = explode(".",$partes[1]);
                            if(preg_match("/^[0-9a-zA-Z\t\-]+$/",$dominios[1]) && substr($dominios[1],strlen($dominios[1])-1,1)!="-" && substr($dominios[1],0,1)!="-"){
                                // echo "<h5>Bien la parte del subdominio</h5>";
                            }else{
                                echo "<h5>Mal la parte del subdominio</h5>";
                            }

                        }else{
                            echo "<h5>Has escrito mal el email.</h5>";
                        }

                        if($_POST['Sexo']!="-1"){
                            // echo "<h5>Bien el sexo.</h5>";
                        }else{
                            echo "<h5>Mal el sexo.</h5>";
                        }

                        $fecha = explode("-",$_POST['date']);

                        if(intval($fecha[0])>0 && intval($fecha[0])<32 && intval($fecha[1])>0 && intval($fecha[1])<13 && intval($fecha[2])>0 && intval($fecha[2])<2022){
                            // echo "<h5>Bien la fecha.</h5>";
                        }else{
                            echo "<h5>Mal la fecha.</h5>";
                        }

                        echo ("El nombre es: ".$_REQUEST['login']."<br>");
                        echo ("La contraseña es: ".$_REQUEST['password']."<br>");
                        echo ("El email es: ".$_REQUEST['email']."<br>");
                        echo ("El sexo es: ".$_REQUEST['Sexo']."<br>");
                        echo ("La fecha es: ".$_REQUEST['date']."<br>");
                        echo ("La ciudad es: ".$_REQUEST['ciudad']."<br>");

                        $usu = $_REQUEST['login'];
                        $clave = $_REQUEST['password'];
                        $email = $_REQUEST['email'];
                        $sexo = $_REQUEST['Sexo'];
                        $date = $_REQUEST['date'];
                        $residencia = 1;
                        $ciudad = $_REQUEST['ciudad'];

                        if($_REQUEST['check']==true){
                                $foto = "Fotos/usu5.png";
                        }else{
                            if(!(empty($_REQUEST['imagen']))){
                                $foto = "Fotos/". $_REQUEST['imagen'];
                            }else{
                                if(!(empty($fila['Foto']))){
                                    $foto = $fila['Foto'];
                                }else{
                                    $foto = " ";
                                }
                            }
                        }

                    }



                    $sentencia = "UPDATE Usuarios SET NomUsuario='$usu',Clave='$clave',Email='$email',Sexo='$sexo',FNacimiento='$date',Ciudad='$ciudad',Pais='$residencia',Foto='$foto',Estilo=3 WHERE IdUsuario = '$idd'";
                    if(!($resultado = $mysqli->query($sentencia))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                        echo '</p>';
                        exit;
                    }else{
                        header("Location: http://localhost/pcw/DAW7/salir.php");
                    }
                  }

                }



            }

            if($_POST['password3']==null){
                if($var1 == 1 || $var2 == 1){
                    echo '<a href="registro.php">Volver a registro.</a>';
                }else{
                    /* Login */
                    $p1="/^[0-9a-zA-Z\t]+$/";
                    if(preg_match($p1,$_POST['login']) && strlen($_REQUEST['login'])>=3 && strlen($_REQUEST['login'])<=15 && substr($_REQUEST['login'],0,1)!=0 && substr($_REQUEST['login'],0,1)!=1 && substr($_REQUEST['login'],0,1)!=2
                        && substr($_REQUEST['login'],0,1)!=3 && substr($_REQUEST['login'],0,1)!=4 && substr($_REQUEST['login'],0,1)!=5 && substr($_REQUEST['login'],0,1)!=6 && substr($_REQUEST['login'],0,1)!=7 && substr($_REQUEST['login'],0,1)!=8
                            && substr($_REQUEST['login'],0,1)!=9){
                        // echo "<h4>bien</h4>";
                    }else{
                        echo "<h5>Has escrito mal el login.</h5>";
                    }

                    /* Clave */
                    $p2="/^(?=.[a-z])(?=.*\d)[a-zA-Z\d]+$/";
                    if(preg_match($p2,$_POST['password']) && strlen($_REQUEST['password'])>=6 && strlen($_REQUEST['password'])<=15){
                        // echo "<h4>bien</h4>";
                    }else{
                        echo "<h5>Has escrito mal la contraseña.</h5>";
                    }

                    /* Email */

                    $p2="/^([a-zA-Z0-9])+([a-zA-Z0-9.-])*@([a-zA-Z0-9-])+([a-zA-Z0-9._-]+)+$/";
                    if(preg_match($p2,$_POST['email']) && strlen($_POST['email'])>0 && strlen($_POST['email'])<254){
                        // echo "<h4>bien</h4>";
                        $partes = explode("@",$_POST['email']);
                        // echo "<h4>". $partes[0] ."</h4>";

                        if(strlen($partes[0])<255 && substr($_REQUEST['email'],strlen($partes[0])-1,1)!="."){
                            // echo "<h4>bien</h4>";
                            $cont=0;
                            for ($i=0; $i < strlen($partes[0]); $i++) {

                                if(substr($_REQUEST['email'],$i,1)=="."){
                                    // $cont=$cont+1;echo "<h4>bien</h4>";
                                    if($cont>=2){
                                        break;
                                    }
                                }else{
                                    $cont=0;
                                }
                            }

                            if($cont>=2){
                                echo "<h5>Demasiados puntos seguidos en la parte-local2 .".$cont."</h5>";
                            }else{
                                // echo "<h4>bien3 ".$cont."</h4>";
                            }



                        }else{
                            echo "<h5>Has escrito mal la parte-local.</h5>";
                        }
                        $dominios = explode(".",$partes[1]);
                        if(preg_match("/^[0-9a-zA-Z\t\-]+$/",$dominios[1]) && substr($dominios[1],strlen($dominios[1])-1,1)!="-" && substr($dominios[1],0,1)!="-"){
                            // echo "<h5>Bien la parte del subdominio</h5>";
                        }else{
                            echo "<h5>Mal la parte del subdominio</h5>";
                        }

                    }else{
                        echo "<h5>Has escrito mal el email.</h5>";
                    }

                    if($_POST['Sexo']!="-1"){
                        // echo "<h5>Bien el sexo.</h5>";
                    }else{
                        echo "<h5>Mal el sexo.</h5>";
                    }

                    $fecha = explode("-",$_POST['date']);

                    if(intval($fecha[0])>0 && intval($fecha[0])<32 && intval($fecha[1])>0 && intval($fecha[1])<13 && intval($fecha[2])>0 && intval($fecha[2])<2022){
                        // echo "<h5>Bien la fecha.</h5>";
                    }else{
                        //echo "<h5>Mal la fecha.</h5>";
                    }

                    $usu = $_REQUEST['login'];
                    $clave = $_REQUEST['password'];
                    $email = $_REQUEST['email'];
                    $sexo = $_REQUEST['Sexo'];
                    $date = $_REQUEST['date'];
                    $residencia = 1;
                    $ciudad = $_REQUEST['ciudad'];
                    $foto = "Fotos/". $_REQUEST['imagen'];

                    echo ("El nombre es: ".$_REQUEST['login']."<br>");
                    echo ("La contraseña es: ".$_REQUEST['password']."<br>");
                    echo ("El email es: ".$_REQUEST['email']."<br>");
                    echo ("El sexo es: ".$_REQUEST['Sexo']."<br>");
                    echo ("La fecha es: ".$_REQUEST['date']."<br>");
                    echo ("La ciudad es: ".$_REQUEST['ciudad']."<br>");
                    echo ("La foto del usuario es: <br>");
                    echo ("<img src=".$foto." alt='no hay foto' width='200' height='150'>");

                }

                $sentencia = "INSERT INTO Usuarios(NomUsuario,Clave,Email,Sexo,FNacimiento,Ciudad,Pais,Foto,Estilo) values('$usu','$clave','$email',$sexo,'$date','$ciudad',$residencia,'$foto',3)";
                if(!($resultado = $mysqli->query($sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . $mysqli->error;
                    echo '</p>';
                    exit;
                }
            }
        ?>

        <div class="copy">
            &copy;
            <a class="url" href="http://deadsoul999.byethost16.com/index.php"></a>
        </div>

    </main>

<?php
require_once("footer.php");
?>