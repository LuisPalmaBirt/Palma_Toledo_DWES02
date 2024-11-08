<?php
include 'funciones.php';
session_start();
if (isset($_SESSION['respuestaValida'])) {
    $respuestaValida = $_SESSION['respuestaValida'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación</title>
</head>

<body>
    <h1>VALIDACIÓN</h1>
    <h2>La validación ha sido exitosa</h2>
    <?php
    echo $respuestaValida;
    ?>
<br>
<a href="index.php">Volver</a>
</body>

</html>