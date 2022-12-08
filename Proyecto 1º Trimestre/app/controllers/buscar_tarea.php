<?php

include("../models/Provincias.php");
include("../models/Usuarios.php");
include("../libreria/creaSelect.php");
include("../models/conx_bd.php");
include("../controllers/varios.php");           

/**
 *  Si no han enviado el fomulario
 */

if (!$_POST) {

    echo $blade->render('listaTareasFiltrando');

}
