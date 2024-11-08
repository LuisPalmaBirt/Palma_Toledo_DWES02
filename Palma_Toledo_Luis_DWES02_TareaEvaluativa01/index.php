<?php

if (isset($_POST['enviar'])){
    session_start();
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $vehiculo = $_POST['vehiculo'];
    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de Reserva de Vehículos</title>
</head>

<body>
    <h1>GESTIÓN DE RESERVAS</h1>
    <form action="request.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" placeholder="Introduce tu nombre" name="nombre" id="nombre">
        <br><br>
        <label for="apellido">Apellido</label>
        <input type="text" placeholder="Introduce tu apellido" name="apellido" id="apellido">
        <br><br>
        <label for="dni">DNI</label>
        <input type="text" placeholder="Introduce tu DNI" name="dni" id="dni">
        <br><br>
        <label for="vehiculo">Elige un vehículo</label>
        <select name="vehiculo">
            <?php
            include "funciones.php";
            echo listaCoches($coches);
            ?>

        </select><br><br>


        <label for="fecha">Fecha de la reserva</label>
        <input type="date" name="fecha" id="fecha">
        <br><br>
        <label for="duracion">Días de la reserva</label>
        <input type="number" name="duracion" id="duracion">
        <br><br>


        <input type="submit" name='enviar' value='Enviar'>

    </form>

</body>

</html>