<?php
include 'funciones.php';
session_start();
if (isset($_SESSION['arrayErrores'])) {
    $arrayErrores = $_SESSION['arrayErrores'];
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
    <h2>La reserva no se ha podido completar</h2>
    <?php
    $html = "";
    $html .= "<ul>";
    foreach ($arrayErrores as $key => $value) {
        if (!$value) {
            $html .= '<li style="color: red;">' . $key . '</li>';
        } else {
            $html .= '<li style="color: green;">' . $key . '</li>';
        }
    }
    $html .= "</ul>";
    echo $html;
    ?>

    <a href="index.php">Volver</a>
</body>

</html>