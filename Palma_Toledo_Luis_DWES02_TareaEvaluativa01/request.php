<?php
include 'funciones.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $vehiculo = $_POST['vehiculo'];
    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];
    $html = "";
    $arrayErrores = array();
}

// Valido los datos del formulario y voy completando un array
$contadorErrores = 0;

if (empty($nombre)) {
    $arrayErrores['El nombre es obligatorio'] = false;
    $contadorErrores += 1;
} else {
    $arrayErrores['Nombre: ' . $nombre] = true;
}

if (empty($apellido)) {
    $arrayErrores['El apellido es obligatorio.'] = false;
    $contadorErrores += 1;
} else {
    $arrayErrores['Apellido: ' . $apellido] = true;
}


if (empty($dni)) {
    $arrayErrores['El DNI es obligatorio.'] = false;
} elseif (!validarDNI($dni)) {
    $arrayErrores['El DNI no es válido.'] = false;
    $contadorErrores += 1;
} else {
    $arrayErrores['DNI: ' . $dni] = true;
}

if (!validarUsuario(USUARIOS, $nombre, $apellido, $dni)) {
    $arrayErrores['El usuario  no es válido'] = false;
    $contadorErrores += 1;
}

if (!cocheDisponible($coches, $vehiculo)) {
    $arrayErrores['El vehículo ' . $vehiculo . ' no está disponible.'] = false;
    $contadorErrores += 1;
} else {
    $arrayErrores['Vehículo: ' . $vehiculo] = true;
}


$fechaHoy = date("Y-m-d");
if (empty($fecha)) {
    $arrayErrores['La fecha es obligatoria.'] = false;
    $contadorErrores += 1;
} elseif ($fecha <= $fechaHoy) {
    $arrayErrores['La fecha debe ser mayor que hoy.'] = false;
    $contadorErrores += 1;
} else {
    $arrayErrores['Fecha: ' . $fecha] = true;
}

$duracion = intval($duracion);
if (empty($duracion)) {
    $arrayErrores['La duración es obligatoria.'] = false;
    $contadorErrores += 1;
} elseif ($duracion < 0 || $duracion > 30) {
    $arrayErrores['La duración debe estar entre 1 y 30 días.'] = false;
    $contadorErrores += 1;
} else {
    if ($duracion > 1) {
        $dias = 'días';
    } else {
        $dias = 'día.';
    }
    $arrayErrores['Duración de la reserva: ' . $duracion . ' ' . $dias] = true;
}


$contador = 0;
foreach ($arrayErrores as $key => $value) {
    if (!$value) {
        $contador++;
    }
}

$html = "";
if ($contador > 0) {
    header('Location: ' . 'noValido.php');
    $_SESSION['arrayErrores'] = $arrayErrores;
} else {
    header('Location: ' . 'valido.php');
    $respuestaValida = "";
    $respuestaValida =  "<h2>" . $nombre . ' ' . $apellido . "</h2>" .
    '<img src="img/' . fotoCoche($coches, $vehiculo) . '"' .  'width="480"' . '/>';
    $_SESSION['respuestaValida'] = $respuestaValida;
}
