<?php
//setlocale(LC_ALL, "es_PE.UTF-8");

include 'Conex.php';
include 'lib/tools/tools.php';
include 'lib/simplehtmldom/simple_html_dom.php';
date_default_timezone_set('America/Lima');

$tools = new tools();
$mes = $tools->GetMes(date("n"));
$dia = $tools->GetDia(date("N"));


$html = file_get_html("http://www.laindustria.pe/");

$noticias = array();
$linknoticias = array();
foreach ($html->find('a[class=RobotoSlabRegular colorTextBlanco textoTruncado]') as $element) {
  $noticias[] = $element->plaintext;
  $linknoticias[] = $element->href;
}


$Rs = mysqli_query($cn, "select * from dispositivos");
$dispositivo = array();
$estado = array();
while ($item = mysqli_fetch_array($Rs)) {
  $dispositivo[] = $item["Nombre"];
  $estado[] = $item["Estado"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="lib/materialize/css/materialize.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="lib/jquery/jquery-3.4.1.min.js"></script>
  <script src="lib/materialize/js/materialize.min.js"></script>
  <title>Adminitrador domótico</title>
</head>

<body bgcolor="#FAF5F4">
  <nav class="light-blue darken-4">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">Inicio</a></li>
        <li class="active"><a href="historial.php">Historial</a></li>
        <li><a href="permisos.php">Permisos</a></li>
        <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="index.php">Inicio</a></li>
    <li class="active"><a href="historial.php">Historial</a></li>
    <li><a href="permisos.php">Permisos</a></li>
    <li><a href="logout.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
  </ul>

  <div style="background:white">
    <marquee behavior="" direction="left" scrollamount="3" style="height:20px">
      <span style="font-size:12px;">
        <?php
        echo "🌎 <strong>Trujillo, " . utf8_decode($dia) . " " . date("d") . " de " . $mes . " de " . date("Y") . "</strong>  |
        <strong style='color:black;'>🎫Noticias:</strong> ✎ <a href='http://www.laindustria.pe/" . $linknoticias[0] . "' target='_blank'>" . $noticias[0] .
          "</a> - ✎ <a href='http://www.laindustria.pe/" . $linknoticias[1] . "' target='_blank'>" . $noticias[1] .
          "</a> - ✎ <a href='http://www.laindustria.pe/" . $linknoticias[2] . "' target='_blank'>" . $noticias[2] .
          "</a> - ✎ <a href='http://www.laindustria.pe/" . $linknoticias[3] . "' target='_blank'>" . $noticias[3] . ".</a>";
        ?>
      </span>
    </marquee>
  </div>
  <div class="divider"></div>
  <section>
    <div class="container">
      <p></p>
      <table class="table centered highlight ">
        <thead>
          <tr>
            <th>Usuario</th>
            <th>Hora</th>
            <th>Dispositivo</th>
            <th>Ubicación</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="" alt=""></td>
            <td>22:58</td>
            <td>Luz Habitación</td>
            <td>Trujillo</td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>
</body>

</html>