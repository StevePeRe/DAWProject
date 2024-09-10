<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style1.css" media="screen">
        <?php
            if(isset($_COOKIE['estilo2'])){
                echo '<link rel="stylesheet"  type="text/css" href="'. $_COOKIE['estilo2'] .'.css" media="screen">';
            }else{
                if(isset($_COOKIE['estilo1'])){
                    echo '<link rel="stylesheet"  type="text/css" href="'. $_COOKIE['estilo1'] .'.css" media="screen">';
                }
            }
        ?>
        <link rel="stylesheet" href="style_impresion.css" media="print">
        <title><?php echo $title; ?></title>
    </head>

