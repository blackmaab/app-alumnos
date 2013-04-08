<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>.:Sistema de Control de Alumnos:.</title>
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/layout.css" media="screen" />        
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/nav.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/cupertino/jquery-ui-1.10.1.custom.css" media="screen" />

        <link rel="stylesheet" type="text/css" href="<?php echo PATH_PLUGINS; ?>/tinyeditor/tinyeditor.css" media="screen" />



        <script type="text/javascript" src="<?php echo PATH_JS; ?>/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo PATH_JS; ?>/jquery-ui-1.10.1.custom.js"></script>

        <script type="text/javascript" src="<?php echo PATH_PLUGINS; ?>/tinyeditor/tiny.editor.packed.js"></script>


        <script type="text/javascript" src="<?php echo PATH_JS; ?>/setup.js"></script>
    </head>
    <body>
        <div class="container_12">
            <div class="grid_12 header-repeat">
                <div id="branding">
                    <div class="floatleft">
                        <img src="resource/images/logo.png" title="Eben Ezer" />
                    </div>
                    <div class="floatright">
                        <div class="floatleft">
                            <img src="resource/images/img-profile.jpg" title="Usuario: Profesor" />
                        </div>
                        <div class="floatleft marginleft10">
                            <ul class="inline-ul floatleft">
                                <li>Bienvenido Profesor</li>
                                <li><a href="#" id="buttonCredencialesProfesor" title="Boton Funcional">Credenciales</a></li>
                                <li><a href="#" id="buttonLogout" title="Boton Funcional">Salir</a></li>
                            </ul>
                            <br />
                            <span class="small grey"><?php echo date('d/m/Y h:i:s'); ?></span>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <ul class="nav main">
                    <li class="ic-usuario">
                        <a href="?mod=profCalificacion">
                            <span>Registrar Calificaciones</span>
                        </a> 
                    </li>
                    <li class="ic-asignacion">
                        <a href="?mod=profVerCursos">
                            <span>Cursos Asignados</span>
                        </a>
                    </li>
                    <li class="ic-report">
                        <a href="?mod=profInformes">
                            <span>Reportes / Informes</span>
                        </a>
                    </li>
                    <li class="ic-notifications">
                        <a href="?mod=prof">
                            <span>Informaci&oacute;n</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clear">
            </div>
            <div class="grid_12">
                <div class="box round first fullpage">
                    <?php
                    include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
                    ?>  
                </div>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
        <div id="site_info">
            <p>
                <?php echo date('Y'); ?> &COPY; &nbsp;Todos los Derechos Reservados
            </p>
        </div>
    </body>
</html>