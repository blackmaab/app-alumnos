<?php

/**
 * Nombre de Archivo: modelo.ctrl.php
 * Fecha Creación: 04-07-2013 
 * Hora: 03:27:13 PM
 * @author Mario Alvarado
 */
include_once 'GenerarClass.class.php';
$obj_generar = new GenerarClass();
$obj_generar->generar_modelo('../model/');
?>
