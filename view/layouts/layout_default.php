<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo PATH_CSS; ?>/style.css" rel="stylesheet" type="text/css"/> 
        <title>.:Sistema de Control de Alumnos:.</title>
    </head>
    <body>
        <div id="divPage">
            <div id="divHead">

            </div>
            <div id="divBody">
                <?php
                include(MODULO_PATH . "/" . $conf[$modulo]['archivo']);
                ?>        
            </div>
            <div id="divFoot">
                <?php echo date('Y'); ?> &COPY; &nbsp;Todos los Derechos Reservados
            </div>
        </div>

    </body>
</html>
