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
define('LAYOUT_SECRE', 'layout_secretaria.php');

$conf['404'] = array(
    'archivo' => '404.view.php',
    'layout' => LAYOUT_DEFECTO
);


$conf['index'] = array(
    'archivo' => 'index.view.html',
    'layout' => LAYOUT_DEFECTO
);

$conf['admin'] = array(
    'archivo' => 'admin/index.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminCursos'] = array(
    'archivo' => 'admin/cursos.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminHorarios'] = array(
    'archivo' => 'admin/horarios.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminAulas'] = array(
    'archivo' => 'admin/aulas.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminAsignacionCursos'] = array(
    'archivo' => 'admin/asignacion.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminPersonas'] = array(
    'archivo' => 'admin/personas.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['adminUsuarios'] = array(
    'archivo' => 'admin/usuarios.view.html',
    'layout' => LAYOUT_ADMIN
);


$conf['secre'] = array(
    'archivo' => 'secretaria/index.view.html',
    'layout' => LAYOUT_SECRE
);

$conf['secreAlumnos'] = array(
    'archivo' => 'secre/',
    'layout' => LAYOUT_SECRE
);

$conf['secrePagos'] = array(
    'archivo' => 'admin/',
    'layout' => LAYOUT_SECRE
);

$conf['secreInformes'] = array(
    'archivo' => 'admin/',
    'layout' => LAYOUT_SECRE
);
?>
