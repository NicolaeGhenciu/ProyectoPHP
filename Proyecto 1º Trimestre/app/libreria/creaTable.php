<?php

function creaTable($name, $nombreCampos, $listaValores, $pk)
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

        if ($name == "listaUsuarios") {
            $html .= '
            <td class="bot"><a class="btn btn-danger" href="/app/controllers/confirmar_borrar.php?nif=' . $valor[$pk] . '"><i class="fa-solid fa-trash-can"></i> Borrar</a>
            <a class="btn btn-warning" href="/app/controllers/procesarModificarUsuario.php?nif=' . $valor[$pk] . '"><i class="fa-solid fa-pen-to-square"></i>Modificar</a></td>';
        } else {

            if ($_SESSION['rol'] == 'Administrador') {
                $html .= '
                <td class="bot"><a class="btn btn-danger" href="/app/controllers/confirmar_borrar.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-trash-can"></i> Borrar</a>
                <a class="btn btn-warning" href="/app/controllers/validar_modficiacion_tarea.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-pen-to-square"></i>Modificar</a>
                <a class="btn btn-info" target="_blank" href="/app/controllers/procesar_VerDetalles.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-eye"></i>Detalles</a></td>';
            } else {
                $html .= '
                <td class="bot">';
                if ($_SESSION['nif'] == $valor['operario_encargado']) {
                    $html .= '<a class="btn btn-success" href="/app/controllers/procesarCompletarTarea.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-pen-to-square"></i>CompletarTarea</a>
                    <a class="btn btn-info" target="_blank" href="/app/controllers/procesar_VerDetalles.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-eye"></i>Detalles</a></td>';
                } else {
                    $html .= '<a class="btn btn-info" target="_blank" href="/app/controllers/procesar_VerDetalles.php?id=' . $valor[$pk] . '"><i class="fa-solid fa-eye"></i>Detalles</a></td>';
                }
            }
        }

    endforeach;

    $html .= '</table>';

    return $html;
}
