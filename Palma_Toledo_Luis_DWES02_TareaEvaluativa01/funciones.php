<?php
declare(strict_types=1);
include 'datos.php';

function listaCoches($coches)
{
    $html = "";
    foreach ($coches as $coche) {

        $html .= "<option>" . $coche["modelo"] . "</option>";
    }
    return $html;
}

function cocheDisponible($coches, $coche)
{
    for ($i = 0; $i < count($coches); $i++) {
        if ($coches[$i]["modelo"] == $coche) {
            return $coches[$i]["disponible"];
        }
    }
}

function fotoCoche($coches,$coche){
    for ($i = 0; $i < count($coches); $i++) {
        if ($coches[$i]["modelo"] == $coche) {
            return $coches[$i]["img"];
        }
    }
}

function letraNif($numero)
{
    return substr("TRWAGMYFPDXBNJZSQVHLCKE", strtr($numero, "XYZ", "012") % 23, 1);
}

function validarDNI($dni)
{
    $numero = substr($dni, 0, 8);
    $letra = letraNif($numero);
    return $dni == $numero . $letra;
}

function validarUsuario($usuarios, $nombre, $apellido, $dni)
{
  
    foreach ($usuarios as $usuario) {
        return strtoupper($nombre) == strtoupper($usuario['nombre']) 
        && strtoupper($apellido) == strtoupper($usuario['apellido']) 
        && $dni == $usuario['dni'];
    }
}
