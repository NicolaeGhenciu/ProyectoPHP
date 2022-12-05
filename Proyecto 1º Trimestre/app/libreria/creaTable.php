<?php

function creaTable($name, $nombreCampos, $listaValores)
{

    $html = '<table class="table table-bordered name="' . $name . '"><tr><thead>';

    foreach ($nombreCampos as $id => $value) :

        $html .= '<th>' . $nombreCampos[$id] . '</th>';

    endforeach;

    $html .= '</thead></tr>';

    foreach ($listaValores as $valor) :

        $html .= '<tr>';

        foreach ($nombreCampos as $id => $value) :

            $html .= '<td >' . $valor[$nombreCampos[$id]] . '</td>';

        endforeach;

        $html .= '<td class="bot"><a href="../views/mensajeBorrarTarea.php?id=' . $valor['id'] . '">Borrar</a></td>
            <td class="bot"><a href="../controllers/validar_modficiacion_tarea.php?id=' . $valor['id'] . '">Modificar</a></td>
            <td class="bot"><a href="../controllers/procesar_VerDetalles.php?id=' . $valor['id'] . '">Detalles</a></td></tr>';

    endforeach;

    $html .= '</table>';

    return $html;
}
