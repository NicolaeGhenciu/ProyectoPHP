<?= $_SESSION['rol'] == 'Operario' ? '
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php">Ver Lista Tareas</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareasPendientes.php">Ver Lista Tareas Pendientes</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarFormularioFiltrado.php">Buscar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarModificarUsuario.php?nif='.$_SESSION['nif'].'">Mi Cuenta</a></div>
' : '
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php">Ver Lista Tareas</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareasPendientes.php">Ver Lista Tareas Pendientes</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/insertar_tarea.php">Insertar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarFormularioFiltrado.php">Buscar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/añadirUsuario.php">Añadir un Usuario</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaUsuarios.php">Ver Lista Usuarios</a></div>
' ?>




<?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/menu.blade.php ENDPATH**/ ?>