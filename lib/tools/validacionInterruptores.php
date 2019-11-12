<?php
$rs=mysqli_query($cn,"select * from dispositivos");

$count=mysqli_num_rows($rs);
$x=0;
while ($item = mysqli_fetch_array($rs)) {
  if ($item["Estado"]=='1') {
    echo "<script>$('#btn" . $x . "').attr('checked',true)</script>";
  }else{
    echo "<script>$('#btn" . $x . "').attr('checked',false)</script>";
  }
  $x=$x+1;
}


echo "<script>

var latitud='';
var longitud='';
navigator.geolocation.getCurrentPosition(function(location) {
   latitud = location.coords.latitude;
   longitud = location.coords.longitude;
});

$(document).ready(function () {";

for ($i = 0; $i < $count; $i++) {

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


for ($i = 0; $i < $count; $i++) {
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
});





$('#btn" . $i . "').on('click', function() {

var condiciones = $('#btn" . $i . "').is(':checked');

if (condiciones) {
  var est = 1;
} else {
  var est = 0;
}
var parametros = {
  'codope': 1,
  'iduser': 1,
  'iddis': " . ($i+1) . ",
  'estado': est,
  'longitud': longitud,
  'latitud': latitud
};

$.ajax({

  data: parametros,
  url: 'lib/tools/acciones.php',
  type: 'POST',
  beforeSend: function() {

  },
  success: function(response) {

  }
});

})

</script>";
}
