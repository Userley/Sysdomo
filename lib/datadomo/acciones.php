<?php
date_default_timezone_set('America/Lima');
include '../../Conex.php';

$op = $_POST["codope"];
$iduser = $_POST["iduser"];
$iddis = $_POST["iddis"];
$est = $_POST["estado"];
$lon = $_POST["longitud"];
$lat = $_POST["latitud"];
$resp = "";

if ($est == '1') {
    $estdis = 'Activado';
} else {
    $estdis = 'Desactivado';
}


if ($op == "1") {

    $RsHistorial = mysqli_query($cn, "insert into historial(IdUsuario,IdDispositivo,Estado,Fecha,Hora,Latitud,Longitud) 
values ('" . $iduser . "','" . $iddis . "','" . $estdis . "','" . date("y-m-d") . "','" . date("H:i:s") . "','" . $lat . "','" . $lon . "') ");

    $RsDispositivos = mysqli_query($cn, "Update dispositivos set Estado=" . $est . " where IdDispositivo=" . $iddis);
    /* Eliminar  solo prueba  */
    $rs = mysqli_query($cn, "update dispositivos set Respuesta='" . $est . "' where IdDispositivo='" . $iddis . "'");
    /*----------------------*/
    $resp = "exito";
}

echo  $resp;
