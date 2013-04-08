<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo PATH_CSS; ?>/style.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS; ?>/cupertino/jquery-ui-1.10.1.custom.css" media="screen" />
        <script type="text/javascript" src="<?php echo PATH_JS?>/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="<?php echo PATH_JS?>/login.js"></script>
          <script type="text/javascript" src="<?php echo PATH_JS; ?>/jquery-ui-1.10.1.custom.js"></script>
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
