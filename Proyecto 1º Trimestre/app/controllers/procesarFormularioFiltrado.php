<?php

include(__DIR__ . "/../controllers/varios.php");

include(__DIR__ . "/../models/conx_bd.php");
include(__DIR__ . '/../models/Tareas.php');

include(__DIR__ . "/../libreria/getContenido.php");
include(__DIR__ . "/../libreria/creaTable.php");

session_start();

if ($_SESSION['rol'] == "Administrador" || $_SESSION['rol'] == "Operario") {

    //if (!isset($_GET['pagina'])) {

    if (!$_POST) { // Si no han enviado el fomulario

        echo $blade->render('formularioFiltrado'); //renderizamos el formulario de filtrado

    } else {

        $todos_los_datos = $_POST; //recogemos todos los datos

        //vamos a comprobar si el valor1 esta vacio, en el caso de estarlo vamos a sumarle el campo el criterio y el valor a la consulta
        // luego vamos a comprobar si el valor 2 y el 3 estan vacios para añadirle un and y hacemos lo mismo en los ifs de abajo.
        // esto nos dara el where para la bbdd

        $consulta = "";

        if (!empty($todos_los_datos["valor1"]) || !empty($todos_los_datos["valor2"]) || !empty($todos_los_datos["valor3"])) {
            $consulta = " WHERE ";
        }

        if (!empty($todos_los_datos["valor1"])) {
            $consulta .= $todos_los_datos["campo1"] . $todos_los_datos["criterio1"] . "'" . $todos_los_datos["valor1"] . "'";
            if (!empty($todos_los_datos["valor2"]) || !empty($todos_los_datos["valor3"])) {
                $consulta .= " AND ";
            }
        }
        if (!empty($todos_los_datos["valor2"])) {
            $consulta .= $todos_los_datos["campo2"] . $todos_los_datos["criterio2"] . "'" . $todos_los_datos["valor2"] . "'";
            if (!empty($todos_los_datos["valor3"])) {
                $consulta .= " AND ";
            }
        }
        if (!empty($todos_los_datos["valor3"])) {
            $consulta .= $todos_los_datos["campo3"] . $todos_los_datos["criterio3"] . "'" . $todos_los_datos["valor3"] . "'";
        }


        //____________paginacion
        /*

        $nombreCampos = [
            'id', 'nif_cif', 'nombre', 'descripcion', 'poblacion',
            'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
        ];

        $tamanioPagina = 8;
        
        
        //Comprobar si se ha enviado por parametro el valor de la página a mostrar


        if (isset($_GET['pagina'])) {

            if ($_GET['pagina'] == 1) {

                header('location:procesar_filtrar_tarea.php');
            } else {

                $pagina = $_GET['pagina'];
            }
        } else {

            $pagina = 1;
        }

        $numFilas = Tareas::getNumeroTareasFiltrado($consulta);

        $totalPaginas = ceil($numFilas / $tamanioPagina);

        
        //Comprobar si se ha enviado el valor de la página por el buscador
        
        if (isset($_GET['numPag'])) {

            if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
                $pagina = $_GET['numPag'];
            }
        }
        

        $empezarDesde = ($pagina - 1) * $tamanioPagina;

        //$registro = Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina);

        echo $blade->render('listaFiltradoTarea', [
            'tareas' => Tareas::getTareasPorPaginaFiltrado($consulta, $empezarDesde, $numFilas),
            'nombreCampos' => $nombreCampos,
            'empezarDesde' => $empezarDesde,
            'tamanioPagina' => $tamanioPagina,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas

        ]);
        
        */
        //_______________________ aqui acaba el intento de paginacion

        $nombreCampos = [
            'id', 'nif_cif', 'nombre', 'descripcion', 'poblacion',
            'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
        ]; //nombre de los campos

        $tamanioPagina = 8;
        $numFilas = Tareas::getNumeroTareasFiltrado($consulta);
        $empezarDesde = 0;

        echo $blade->render('listaFiltradoTarea', [ //renderizamos el lista filtrado Tarea
            'tareas' => Tareas::getTareasPorPaginaFiltrado($consulta, $empezarDesde, $numFilas),
            'nombreCampos' => $nombreCampos,
        ]);
    }
}

//}
