<?php

function creaTable($name, $nombreCampos, $listaValores)
{

    $html = '<table class="table table-bordered" name="' . $name . '"><tr><thead>';

    foreach ($nombreCampos as $id => $value) :

        $html .= '<th>' . $nombreCampos[$id] . '</th>';

    endforeach;

    $html .= '<th>Modificaciones</th>';
    $html .= '</thead></tr>';


    foreach ($listaValores as $valor) :

        $html .= '<tr>';

        foreach ($nombreCampos as $id => $value) :

            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;

        if ($_SESSION['rol'] == 'Administrador') {
            $html .= '
            <td class="bot"><a class="btn btn-danger" href="/app/controllers/confirmar_borrar.php?id=' . $valor['id'] . '">Borrar</a>
            <a class="btn btn-warning" href="/app/controllers/validar_modficiacion_tarea.php?id=' . $valor['id'] . '">Modificar</a>
            <a class="btn btn-info" target="_blank" href="/app/controllers/procesar_VerDetalles.php?id=' . $valor['id'] . '">Detalles</a></td>';
        } else {
            $html .= '
            <td class="bot">
            <a class="btn btn-success" href="/app/controllers/procesarCompletarTarea.php?id=' . $valor['id'] . '">CompletarTarea</a>
            <a class="btn btn-info" target="_blank" href="/app/controllers/procesar_VerDetalles.php?id=' . $valor['id'] . '">Detalles</a></td>';
        }

    endforeach;

    $html .= '</table>';

    return $html;
}
