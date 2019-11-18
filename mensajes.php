<?php
include 'Conex.php';
$mensaje=$_POST["mensaje"];
$rs=mysqli_query($cn,"insert into mensajes (mensaje) values ('".$mensaje."')");
echo $mensaje . "<br>";
