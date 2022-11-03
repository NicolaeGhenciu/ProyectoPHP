<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controllers/validar_tarea.php" method="post">
        <label>NIF o CIF:</label>
        <input type="text" name="nif_cif"> <br>
        <label>Persona de contacto :</label> <br>
        <label>Nombre: </label>
        <input type="text" name="nombre"> <br>
        <label>Apellidos: </label>
        <input type="text" name="apellidos"> <br>
        <label>Teléfono: </label>
        <input type="text" name="telefono"> <br>
        <label>Descripción: </label> <br>
        <textarea name="descripcion" cols="30" rows="3"></textarea> <br>
        <label>Correo electrónico: </label>
        <input type="text" name="email"> <br>
        <label>Dirección: </label>
        <input type="text" name="direccion"> <br>
        <label>Población: </label>
        <input type="text" name="poblacion"> <br>
        <label>Codigo Postal: </label>
        <input type="text" name="cod_postal"> <br>
        <label>Provincia: </label>
        <select name="provincia">
            <option hidden selected>Selecciona una provincia</option>
            <option value="21">Huelva</option>
            <option value="29">Málaga</option>
            <option value="23">Jaén</option>
            <option value="41">Sevilla</option>
            <option value="14">Córdoba</option>
            <option value="04">Almería</option>
            <option value="11">Cadíz</option>
            <option value="18">Granada</option>
        </select> <br>
        <label>Estado: </label>
        <select name="estado">
            <option hidden selected>Selecciona un estado</option>
            <option value="B">B=Esperando ser aprobada</option>
            <option value="P">P=Pendiente</option>
            <option value="R">R=Realizada</option>
            <option value="C">C=Cancelada</option>
        </select> <br>
        <label>Fecha de creación de la tarea: </label>
        <input type="date" name="fecha_creacion"> <br>
        <label>Operario encargado: </label>
        <select name="">
            <option value=""></option>
        </select> <br>
        <label>Fecha de realización: </label>
        <input type="date" name="fecha_realizacion"> <br>
        <label>Anotaciones anteriores: </label> <br>
        <textarea name="anotaciones_anteriores" cols="30" rows="3"></textarea> <br>
        <label>Anotaciones posteriores: </label> <br>
        <textarea name="anotaciones_posteriores" cols="30" rows="3"></textarea> <br>
        <label>Fichero resumen: </label> <br>
        <input type="file" name=""> <br>
        <label>Fotos del trabajo realizado: </label> <br>
        <input type="file" name=""> <br>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>