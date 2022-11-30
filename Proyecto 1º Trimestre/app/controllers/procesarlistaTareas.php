<?php

    include('../models/Tareas.php');
    include('../models/conx_bd.php');
    include('../libreria/creaTable.php');

    //$listaTareas = Tarea::getListaTareas();

    $nombreCampos = [
        'id','nif_cif','nombre','apellidos','telefono','descripcion','email','direccion','poblacion',
        'codigo_postal','provincias','estado','fecha_creacion','operario_encargado','fecha_realizacion',
        'anotaciones_anteriores','anotaciones_posteriores','fichero_resumen','foto_trabajo'
    ];


     // Preparar

     $tamanioPagina = 5;

     if(isset($_GET['pagina'])){

         if($_GET['pagina'] == 1){

             header('location:procesarListaTareas.php');
         
         }else{
         
             $pagina = $_GET['pagina'];

         }

     }else{

         $pagina = 1;

     }

     $empezarDesde = ($pagina-1) * $tamanioPagina;
    //echo "empezardesde: " . $empezarDesde . " pagina: " . $pagina . "<br>";

    $numFilas = Tareas::getNumeroTareas();
    $totalPaginas = ceil($numFilas / $tamanioPagina);

    $registro = Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina);

    include('../views/listaTareas.php');

        for($i = 1; $i <= $totalPaginas; $i++){

            echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
        }