<?php
//setlocale(LC_ALL, "es_PE.UTF-8");
date_default_timezone_set('America/Lima');
session_start();
if (!isset($_SESSION["idusuario"])) {
  header("location:login.php");
}

include 'Conex.php';
include 'lib/tools/tools.php';
include 'lib/simplehtmldom/simple_html_dom.php';

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


$idusuario = $_SESSION["idusuario"];
$usuario = utf8_encode($_SESSION["usuario"]);
$correo = $_SESSION["Correo"];
$img = $_SESSION["Img"];




$Rs = mysqli_query($cn, "SELECT concat(U.Nombres,' ', U.Apellidos) AS Usuario,U.NomUser, U.Img, D.Nombre,H.Estado , H.Fecha, H.Hora, H.Latitud, H.Longitud FROM usuarios U
INNER JOIN historial H ON H.IdUsuario=U.IdUsuario
INNER JOIN dispositivos D ON D.IdDispositivo=H.IdDispositivo ORDER BY H.Fecha Desc");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="img/Home.png" />
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
      <div class="cabecera">
        <a href="index.php" class="brand-logo"><img src="img/logo.png" alt="" width="85px" style="vertical-align: middle;"></a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="index.php">Inicio</a></li>
          <li class="active"><a href="historial.php">Historial</a></li>
          <li><a href="permisos.php">Permisos</a></li>
          <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <ul class="sidenav" id="slide-out">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="img/menu.jpg">
        </div>
        <a href="#user"><img class="circle" src="<?php echo $img; ?>"></a>
        <a href="#name"><span class="white-text name"><?php echo $usuario; ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $correo; ?></span></a>
      </div>
    </li>
    <li><a href="index.php">Inicio</a></li>
    <li class="active"><a href="historial.php">Historial</a></li>
    <li><a href="permisos.php">Permisos</a></li>
    <li><a href="logout.php"><i class="material-icons">exit_to_app</i>Salir</a></li>
  </ul>

  <div style="background:white">
    <marquee behavior="" direction="left" scrollamount="3" style="height:20px">
      <span style="font-size:12px;">
        <?php
        echo "📌 <strong>Trujillo, " . $dia . " " . date("d") . " de " . $mes . " de " . date("Y") . "</strong>  |
        <strong style='color:black;'>📰Noticias:</strong> 🔗 <a href='http://www.laindustria.pe/" . $linknoticias[0] . "' target='_blank'>" . $noticias[0] .
          "</a> - 🔗 <a href='http://www.laindustria.pe/" . $linknoticias[1] . "' target='_blank'>" . $noticias[1] .
          "</a> - 🔗 <a href='http://www.laindustria.pe/" . $linknoticias[2] . "' target='_blank'>" . $noticias[2] .
          "</a> - 🔗 <a href='http://www.laindustria.pe/" . $linknoticias[3] . "' target='_blank'>" . $noticias[3] . ".</a>";
        ?>
      </span>
    </marquee>
    <div class="divider"></div>
    <section>
      <div class="container">
        <p></p>
        <strong>
          <h5>
            <p style="text-align: center;" class="light-blue-text text-darken-4"><strong>Historial de Actividades</strong></p>
          </h5>
        </strong>
        <table class="table centered highlight table-small">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Dispositivo</th>
              <th>Estado</th>
              <th>Fecha / Hora</th>
              <th>Ubicación</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($item = mysqli_fetch_array($Rs)) {
              if ($item["Estado"] == "Activado") {
                $est = "green-text";
              } else {
                $est = "red-text";
              }

              echo "<tr>
            <td><img src='" . $item["Img"] . "' title='" . utf8_encode($item["Usuario"]) . "' width='45px' alt='' class='usuario' style='vertical-align: middle;'>    <label style='vertical-align: middle;'>" . $item["NomUser"] . "</label></td>
            <td style='font-size:14px'>" . $item["Nombre"] . "</td>
            <td style='font-size:30px'><span class='" . $est . "'>●</span></td>
            <td style='font-size:14px'>" . $item["Fecha"] . " " . $item["Hora"] . "</td>
            <td><a href='https://maps.google.com/?q=" . $item["Latitud"] . "," . $item["Longitud"] . "' target='_blank'><span class='new badge red' data-badge-caption=''>Ver</span></a></td>
          </tr>";
            }
            ?>

          </tbody>
          <tfoot>


            <tr>
              <ul class="pagination center-align">
                <?php
                $count = mysqli_num_rows($Rs);
                $totalIndice = ($count / 50);
                if ($totalIndice > round($totalIndice)) {
                  $totalIndice = $totalIndice + 1;
                }
                for ($i = 1; $i <= round($totalIndice); $i++) {
                  echo "<li class='waves-effect'><a href='historial.php?id=" . $i . "'>$i</a></li>";
                }
                ?>
              </ul>
            </tr>
          </tfoot>
        </table>
      </div>

    </section>
    <script src="js/validacion.js"></script>

</body>

</html>