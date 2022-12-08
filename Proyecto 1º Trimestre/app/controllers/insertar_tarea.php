<?php

include("varios.php");
include("utilsforms.php");
include("../libreria/creaSelect.php");

include("../models/conx_bd.php");
$bd = conx_basedatos::getInstance();
include("../models/Provincias.php");
include("../models/Usuarios.php");
include("../models/Tareas.php");

include("../libreria/validarCodigoPostal.php");
include("../libreria/validarDni.php");
include("../libreria/validarCIF.php");
include("../libreria/validarEmail.php");
include("../libreria/validarFechadeRealizacion.php");
include("../libreria/validarTelefono.php");
include("../libreria/subirArchivos.php");

include("../libreria/getContenido.php");

$hayError = FALSE;
$errores = [];
$fcha = date("Y-m-d");

if (!$_POST) { // Si no han enviado el fomulario
    echo $blade->render('formulario_tarea', [
        'fcha' => $fcha,
    ]);
} else {

    if (empty($_POST["nombre"])) {
        $errores['nombre'] = 'Campo nombre se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["apellidos"])) {
        $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["descripcion"])) {
        $errores['descripcion'] = 'Campo descripción se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["codigo_postal"]) || !validarCodigoPostal($_POST["codigo_postal"])) {
        $errores['codigo_postal'] = 'Campo Codigo Postal tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["nif_cif"]) || !validarCIF($_POST["nif_cif"]) && !validarDni($_POST["nif_cif"])) {
        $errores['nif_cif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
        $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["email"]) || !validarEmail($_POST["email"])) {
        $errores['email'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["fecha_realizacion"]) || !validarFechaRealizacion($_POST["fecha_realizacion"])) {
        $errores['fecha_realizacion'] = 'Campo fecha de realización se encuentra vacio o no es valido, la fecha tiene que ser posterior a la de hoy';
        $hayError = TRUE;
    }

    if ($hayError) {
        echo $blade->render('formulario_tarea', [
            'fcha' => $fcha,
        ]);
    } else {
        $todos_los_campos = $_POST;
        //$todos_los_campos['fecha_creacion'] = $fcha;
        Tareas::insertarTarea(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false));
        header("location:procesarListaTareas.php");
    }

}
