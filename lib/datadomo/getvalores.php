<?php
include '../../Conex.php';
$ids="";
$rs = mysqli_query($cn, "select * from dispositivos");
while ($data = mysqli_fetch_array($rs)) {
    $ids = $ids . "," . $data["Estado"] ;
}
$valestado = substr( str_replace(',', '-', $ids),1);

echo $valestado;
