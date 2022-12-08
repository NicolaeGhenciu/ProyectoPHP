<?php

    include("utilsforms.php");
    include("../libreria/subirArchivos.php");
    include("../models/Tareas.php");
    include("../libreria/getContenido.php");
    include("../models/conx_bd.php");
    include("../controllers/varios.php");
    
     /**
     *  Si no han enviado el fomulario
     */

    if (!$_POST) {
        $id = $_GET['id'];
        $datosTarea = Tareas::getdatosTarea($id);
        echo $blade->render('formularioCompletarTarea', [
            'id' => $id,
            'datosTarea' => $datosTarea
        ]);

    /**
     *  Si han enviado el fomulario
     */

    } else {
        
        $todos_los_campos = $_POST;

        $id = $_GET['id'];

        if ($_FILES['fichero_resumen']['name'] == "") {
            $todos_los_campos["fichero_resumen"] = "";
        } else {
            subirArchivo('fichero_resumen', $id);
            $todos_los_campos["fichero_resumen"] = "Tarea-" . $id . "-" . $_FILES['fichero_resumen']['name'];
        }

        if ($_FILES['foto_trabajo']['name'] == "") {
            $todos_los_campos["foto_trabajo"] = "";
        } else {
            subirArchivo('foto_trabajo', $id);
            $todos_los_campos["foto_trabajo"] = "Tarea-" . $id . "-" . $_FILES['foto_trabajo']['name'];
        }

        Tareas::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id);

        header("location:procesarListaTareas.php");
    
    }