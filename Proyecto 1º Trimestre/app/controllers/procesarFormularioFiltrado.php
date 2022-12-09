<?php
session_start();
include("../models/conx_bd.php");
include("../controllers/varios.php");
include('../models/Tareas.php');
include("..//libreria/getContenido.php");
include("..//libreria/creaTable.php");

/**
 *  Si no han enviado el fomulario
 */

if (!isset($_GET['pagina'])) {

    if (!$_POST) {

        echo $blade->render('formularioFiltrado');
    } else {

        $todos_los_datos = $_POST;

        $consulta = " WHERE ";

        if (!empty($todos_los_datos["valor1"])) {
            $consulta .= $todos_los_datos["campo1"] . $todos_los_datos["criterio1"] . "'" . $todos_los_datos["valor1"] . "'";
            if (!empty($todos_los_datos["valor2"])) {
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

        //_______________________

        $nombreCampos = [
            'id', 'nif_cif', 'nombre', 'descripcion', 'poblacion',
            'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
        ];

        $tamanioPagina = 8;

        /**
         * Comprobar si se ha enviado por parametro el valor de la página a mostrar
         */

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

        /**
         * Comprobar si se ha enviado el valor de la página por el buscador
         */
        if (isset($_GET['numPag'])) {

            if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
                $pagina = $_GET['numPag'];
            }
        }

        $empezarDesde = ($pagina - 1) * $tamanioPagina;

        //$registro = Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina);

        $listaValores = [];

        //_______________________

        echo $blade->render('listaFiltradoTarea', [
            'tareas' => Tareas::buscarTarea($consulta),
            'nombreCampos' => $nombreCampos,
            'empezarDesde' => $empezarDesde,
            'tamanioPagina' => $tamanioPagina,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas

        ]);
    }
}
