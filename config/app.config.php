<?php

/**
 * Nombre de Archivo: app.config.php
 * Fecha Creación: 02-28-2013 
 * Hora: 07:35:14 PM
 * @author Mario Alvarado
 */
/* DEFINICION DE LA LOCALIZACION */
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
define('LAYOUT_PROF', 'layout_profesor.php');
define('LAYOUT_ALUM', 'layout_alumno.php');
define('LAYOUT_NEWREGISTER', 'layout_newRegister.php');

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


$conf['adminCredenciales'] = array(
    'archivo' => 'admin/credenciales.view.html',
    'layout' => LAYOUT_ADMIN
);

$conf['secre'] = array(
    'archivo' => 'secretaria/index.view.html',
    'layout' => LAYOUT_SECRE
);

$conf['secreAlumnos'] = array(
    'archivo' => 'secretaria/alumno.view.html',
    'layout' => LAYOUT_SECRE
);

$conf['secrePagos'] = array(
    'archivo' => 'secretaria/pagos.view.html',
    'layout' => LAYOUT_SECRE
);

$conf['secreInformes'] = array(
    'archivo' => 'secretaria/report.view.html',
    'layout' => LAYOUT_SECRE
);


$conf['secreCredenciales'] = array(
    'archivo' => 'secretaria/credenciales.view.html',
    'layout' => LAYOUT_SECRE
);

$conf['prof'] = array(
    'archivo' => 'profesor/index.view.html',
    'layout' => LAYOUT_PROF
);

$conf['profInformes'] = array(
    'archivo' => 'profesor/report.view.html',
    'layout' => LAYOUT_PROF
);

$conf['profVerCursos'] = array(
    'archivo' => 'profesor/cursos.view.html',
    'layout' => LAYOUT_PROF
);

$conf['profCalificacion'] = array(
    'archivo' => 'profesor/calificacion.view.html',
    'layout' => LAYOUT_PROF
);

$conf['profCredenciales'] = array(
    'archivo' => 'profesor/credenciales.view.html',
    'layout' => LAYOUT_PROF
);

$conf['alum'] = array(
    'archivo' => 'alumno/index.view.html',
    'layout' => LAYOUT_ALUM
);

$conf['alumFicha'] = array(
    'archivo' => 'alumno/ficha.view.html',
    'layout' => LAYOUT_ALUM
);

$conf['alumNotas'] = array(
    'archivo' => 'alumno/calificacion.view.html',
    'layout' => LAYOUT_ALUM
);

$conf['alumRegistro'] = array(
    'archivo' => 'alumno/cursos.view.html',
    'layout' => LAYOUT_ALUM
);

$conf['alumPagos'] = array(
    'archivo' => 'alumno/pagos.view.html',
    'layout' => LAYOUT_ALUM
);


$conf['newRegister'] = array(
    'archivo' => 'newRegister.view.html',
    'layout' => LAYOUT_NEWREGISTER
);

$conf['alumCredenciales'] = array(
    'archivo' => 'alumno/credenciales.view.html',
    'layout' => LAYOUT_ALUM
);
?>
