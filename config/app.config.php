<?php

/**
 * Nombre de Archivo: app.config.php
 * Fecha Creación: 02-28-2013 
 * Hora: 07:35:14 PM
 * @author Mario Alvarado
 */
/*DEFINICION DE LA LOCALIZACION*/
date_default_timezone_set('America/El_Salvador');

/* DEFINICION DE DIRECTORIOS */
define('PATH_CSS', 'resource/css');
define('PATH_IMAGES', 'resource/images');
define('PATH_JS', 'resource/js');
define('PATH_PLUGINS', 'resource/plugins');


define('MODULO_DEFECTO', 'index');
define('LAYOUT_DEFECTO', 'layout_default.php');
define('MODULO_PATH', realpath('view'));
define('LAYOUT_PATH', realpath('view/layouts/'));
define('LAYOUT_ADMIN', 'layout_admin.php');

$conf['404'] = array(
    'archivo' => '404.view.php',
    'layout' => LAYOUT_DEFECTO
);


$conf['index'] = array(
    'archivo' => 'index.view.html',
    'layout' => LAYOUT_DEFECTO
);

$conf['admin'] = array(
    'archivo' => 'admin/admin.view.html',
    'layout' => LAYOUT_ADMIN
);
?>
