<?php

include(__DIR__ . "/varios.php");
include(__DIR__ . "/utilsforms.php");

include(__DIR__ . "/../models/conx_bd.php");

include(__DIR__ . "/../models/Provincias.php");
include(__DIR__ . "/../models/Usuarios.php");
include(__DIR__ . "/../models/Tareas.php");

include(__DIR__ . "/../libreria/creaSelect.php");
include(__DIR__ . "/../libreria/validarCodigoPostal.php");
include(__DIR__ . "/../libreria/validarString.php");
include(__DIR__ . "/../libreria/validarDni.php");
include(__DIR__ . "/../libreria/validarCIF.php");
include(__DIR__ . "/../libreria/validarEmail.php");
include(__DIR__ . "/../libreria/validarFechadeRealizacion.php");
include(__DIR__ . "/../libreria/validarTelefono.php");
include(__DIR__ . "/../libreria/subirArchivos.php");
include(__DIR__ . "/../libreria/getContenido.php");

session_start();

if ($_SESSION['rol'] == "Administrador") { //comprobamos si el usuario es administrador

    $hayError = FALSE; //iniciamos la variable hay error
    $errores = []; //array que almacenara los errores
    //$fcha = date("Y-m-d"); se usaba para pasar la fecha a la vista del formulario

    if ($_SESSION['rol'] == "Administrador") {

        if (!$_POST) { // Si no han enviado el fomulario

            echo $blade->render('formulario_tarea'); //renderizamos el formulario tarea

        } else { //una vez enviado el formulario

            //hacemos las validaciones
            //validacion nombre
            if (empty($_POST["nombre"]) || !validarString($_POST["nombre"])) {
                $errores['nombre'] = 'Campo nombre se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion apellidos
            if (empty($_POST["apellidos"]) || !validarString($_POST["apellidos"])) {
                $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion descripción
            if (empty($_POST["descripcion"]) || !validarStringyNumber($_POST["descripcion"])) {
                $errores['descripcion'] = 'Campo descripción se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion codigo postal
            if (empty($_POST["codigo_postal"]) || !validarCodigoPostal($_POST["codigo_postal"])) {
                $errores['codigo_postal'] = 'Campo Codigo Postal tiene un formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion nif y cif
            if (empty($_POST["nif_cif"]) || !validarCIF($_POST["nif_cif"]) && !validarDni($_POST["nif_cif"])) {
                $errores['nif_cif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion telefono
            if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
                $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion email
            if (empty($_POST["email"]) || !validarEmail($_POST["email"])) {
                $errores['email'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion fecha realizacion
            if (empty($_POST["fecha_realizacion"]) || !validarFechaRealizacion($_POST["fecha_realizacion"])) {
                $errores['fecha_realizacion'] = 'Campo fecha de realización se encuentra vacio o no es valido, la fecha tiene que ser posterior a la de hoy';
                $hayError = TRUE;
            }
            //validacion direccion
            if (!validarStringyNumber($_POST["direccion"])) {
                $errores['direccion'] = 'Formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }
            //validacion poblacion
            if (!validarStringyNumber($_POST["poblacion"])) {
                $errores['poblacion'] = 'Formato incorrecto o se encuentra vacio';
                $hayError = TRUE;
            }

            if ($hayError) { //si hay un error renderizamos el formulario tarea de nuevo

                echo $blade->render('formulario_tarea');
                
            } else { //si no hay errores

                $todos_los_campos = $_POST; //recogemos todos los datos del formulario

                Tareas::insertarTarea(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false)); //insertamos la tarea

                header("location:procesarListaTareas.php"); //mostramos la lista de tareas
            }
        }
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
