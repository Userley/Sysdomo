<?php
date_default_timezone_set('America/Lima');
include '../../Conex.php';

$op = $_POST["codope"];
$iduser = $_POST["iduser"];
$iddis = $_POST["iddis"];
$est = $_POST["estado"];
$lon = $_POST["longitud"];
$lat = $_POST["latitud"];
$resp="";

if ($op == "1") {

    $Rs = mysqli_query($cn, "insert into historial(IdUsuario,IdDispositivo,Estado,Fecha,Hora,Latitud,Longitud) 
values ('" . $iduser . "','" . $iddis . "','" . $est . "','" . date("d-m-y") . "','" . date("H:i:s") . "','" . $lat . "','" . $lon . "') ");
$resp="exito";
}

echo  $resp;
