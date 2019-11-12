<?php

echo "<script>$(document).ready(function () {";

for ($i = 0; $i < 6; $i++) {

  echo "if (!$('#btn" . $i . "').prop('checked')) {
  $('#off" . $i . "').attr('style', 'color:white;font-weight: bold;');
  $('#on" . $i . "').attr('style', '');
  $('#notificacion" . $i . "').html('El dispositivo está apagado');
  $('#icomsj" . $i . "').attr('class', 'material-icons grey-text');
} else {
  $('#off" . $i . "').attr('style', '');
  $('#on" . $i . "').attr('style', 'color:white;font-weight: bold;');
  $('#notificacion" . $i . "').html('El dispositivo está encendido');
  $('#icomsj" . $i . "').attr('class', 'material-icons yellow-text');
}";
}
echo "});</script>";


for ($i = 0; $i < 6; $i++) {
  echo "<script>$('#btn" . $i . "').click(function () {
  if (!$('#btn" . $i . "').prop('checked')) {
    $('#off" . $i . "').attr('style', 'color:white;font-weight: bold;');
    $('#on" . $i . "').attr('style', '');
    $('#notificacion" . $i . "').html('El dispositivo está apagado');
    $('#icomsj" . $i . "').attr('class', 'material-icons grey-text');
  } else {
    $('#off" . $i . "').attr('style', '');
    $('#on" . $i . "').attr('style', 'color:white;font-weight: bold;');
    $('#notificacion" . $i . "').html('El dispositivo está encendido');
    $('#icomsj" . $i . "').attr('class', 'material-icons yellow-text');
  }
});</script>";
}
?>