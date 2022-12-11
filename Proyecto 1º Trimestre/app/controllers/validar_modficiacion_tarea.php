<?php

include(__DIR__ . "/../models/conx_bd.php");
include(__DIR__ . "/../models/Provincias.php");
include(__DIR__ . "/../models/Usuarios.php");
include(__DIR__ . "/../models/Tareas.php");

include(__DIR__ . "/../controllers/varios.php");
include(__DIR__ . "/../controllers/utilsforms.php");

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

    if (!$_POST) { // Si no han enviado el fomulario

        $id = $_GET['id']; // recogemos la id

        $datosTarea = Tareas::getdatosTarea($id); //recogemos los datos de la tarea gracias al id

        echo $blade->render('formularioModificarTarea', [ //renderizamos el formulario modificar tarea
            'datosTarea' => $datosTarea,
            'id' => $id,
        ]);
    } else {
        //hacemos las validaciones
        //validacion nombre
        if (empty($_POST["nombre"]) || !validarString($_POST["nombre"])) {
            $errores['nombre'] = 'Campo nombre se encuentra vacio o formato es incorrecto';
            $hayError = TRUE;
        }
         //validacion apellidos
        if (empty($_POST["apellidos"]) || !validarString($_POST["apellidos"])) {
            $errores['apellidos'] = 'Campo apellidos se encuentra vacio o formato es incorrecto';
            $hayError = TRUE;
        }
         //validacion descripcion
        if (empty($_POST["descripcion"]) || !validarStringyNumber($_POST["descripcion"])) {
            $errores['descripcion'] = 'Campo descripción se encuentra vacio o formato es incorrecto';
            $hayError = TRUE;
        }
         //validacion codigo_postal
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
         //validacion anotaciones anteriores
        if (!validarStringyNumber($_POST["anotaciones_anteriores"])) {
            $errores['anotaciones_anteriores'] = 'Formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
         //validacion anotaciones posteriores
        if (!validarStringyNumber($_POST["anotaciones_posteriores"])) {
            $errores['anotaciones_posteriores'] = 'Formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }

        if ($hayError) {//si hay un error renderizamos el formulario tarea de nuevo

            $id = $_GET['id']; //recogemos el id
            
            echo $blade->render('formularioModificarTarea', [ 
                'id' => $id,
            ]);
        
        } else {

            $todos_los_campos = $_POST; //recogemos todos los campos

            //$todos_los_campos['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);

            $id = $_GET['id'];

            if ($_FILES['fichero_resumen']['name'] == "") { //comprobamos si el nombre del fichero esta vacio
                $todos_los_campos["fichero_resumen"] = ""; //le asignamos ""
            } else {
                subirArchivo('fichero_resumen', $id); // llamamos a la funcion subirArchivo que nos pondra el fichero en la carpeta FILES
                $todos_los_campos["fichero_resumen"] = "Tarea-" . $id . "-" . $_FILES['fichero_resumen']['name']; //cambiamos el nombre del campo que recibimos cuando hacemos $_POST
            }

            if ($_FILES['foto_trabajo']['name'] == "") {//comprobamos si el nombre del fichero esta vacio
                $todos_los_campos["foto_trabajo"] = ""; //le asignamos ""
            } else {
                subirArchivo('foto_trabajo', $id); // llamamos a la funcion subirArchivo que nos pondra el fichero en la carpeta FILES
                $todos_los_campos["foto_trabajo"] = "Tarea-" . $id . "-" . $_FILES['foto_trabajo']['name']; //cambiamos el nombre del campo que recibimos cuando hacemos $_POST
            }

            Tareas::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id); //actualizamos los campos tarea

            header("location:procesarListaTareas.php"); //mostramos lista Tareas
        }
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
