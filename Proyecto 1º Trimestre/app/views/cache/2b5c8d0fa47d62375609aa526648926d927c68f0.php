<?= $_SESSION['rol'] == 'Operario' ? '
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php"><i class="fa-sharp fa-solid fa-list-ul"></i> Ver Lista Tareas</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareasPendientes.php"><i class="fa-sharp fa-solid fa-list-check"></i> Ver Lista Tareas Pendientes</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarFormularioFiltrado.php"><i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarModificarUsuario.php?nif='.$_SESSION['nif'].'"><i class="fa-solid fa-user"></i> Mi Cuenta</a></div>
' : '
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareas.php"><i class="fa-sharp fa-solid fa-list-ul"></i> Ver Lista Tareas</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaTareasPendientes.php"><i class="fa-sharp fa-solid fa-list-check"></i> Ver Lista Tareas Pendientes</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/insertar_tarea.php"><i class="fa-sharp fa-solid fa-file-circle-plus"></i> Insertar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarFormularioFiltrado.php"><i class="fa-sharp fa-solid fa-magnifying-glass"></i> Buscar Tarea</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/añadirUsuario.php"><i class="fa-sharp fa-solid fa-user-plus"></i> Añadir un Usuario</a></div>
<div class="nav-item"><a class="navbar-brand" href="/app/controllers/procesarlistaUsuarios.php"><i class="fa-sharp fa-solid fa-users"></i> Ver Lista Usuarios</a></div>
' ?>




<?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/menu.blade.php ENDPATH**/ ?>