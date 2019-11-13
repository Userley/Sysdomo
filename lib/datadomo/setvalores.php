<?php
include '../../Conex.php';

$Iddispositivo=$_GET["dis"];
$estado=$_GET["est"];

$rs=mysqli_query($cn,"update dispositivos set Respuesta='".$estado."' where IdDispositivo='".$Iddispositivo."'")

?>