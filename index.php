<?php

/**
 * Nombre de Archivo: index.php
 * Fecha Creación: 02-28-2013 
 * Hora: 07:22:31 PM
 * @author Mario Alvarado
 */
include_once('config/app.config.php');
if (!empty($_GET['mod'])) :
    $modulo = $_GET['mod'];
else:
    $modulo = MODULO_DEFECTO;
endif;

//verificacion si existe el modulo a cargar
if (empty($conf[$modulo]["layout"])) :
    $modulo = "404";
endif;

$path_layout = LAYOUT_PATH . '/' . $conf[$modulo]["layout"];

if (!empty($conf[$modulo]['layout'])) :
    include($path_layout);
else:
    $modulo = "404";
    $path_layout = LAYOUT_PATH . '/' . $conf[$modulo]["layout"];
    include($path_layout);
endif;
?>
