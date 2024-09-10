<?php

        if(isset($_POST['Estilo'])){
            setcookie('estilo2',$_POST['Estilo'],time()+90*24*60*60);
        }

        header("Location: http://localhost/pcw/DAW7/confi.php");

?>