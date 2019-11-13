<?php
//setlocale(LC_ALL, "es_PE.UTF-8");

include 'Conex.php';
include 'lib/tools/tools.php';
include 'lib/simplehtmldom/simple_html_dom.php';
date_default_timezone_set('America/Lima');
session_start();
if (!isset($_SESSION["idusuario"])) {
  header("location:login.php");
}

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







if (isset($_POST['dis1'])) {
  $Rss = mysqli_query($cn, "update dispositivos set Nombre='" . $_POST['txtnombredis1'] . "' where IdDispositivo='1'");
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
          <li class="active"><a href="index.php">Inicio</a></li>
          <li><a href="historial.php">Historial</a></li>
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
    <li class="active"><a href="index.php">Inicio</a></li>
    <li><a href="historial.php">Historial</a></li>
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
  </div>
  <div class="divider"></div>
  <section>
    <div class="container">
      <div>
        <h5 style="text-align:center;color:steelblue"><strong>Iluminación</strong></h5>
      </div>
      <div class="row">
        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[0]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off0">Off</span>
                      <input type="checkbox" id="btn0">
                      <span class="lever"></span>
                      <span id="on0">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj0" class="material-icons yellow-text">notifications</i><span id="notificacion0">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>

                  <form action="" method="POST">
                    <input type="text" name="txtnombredis1" id="txtnombredis1" value="<?php echo $dispositivo[0]; ?>">
                    <input type="submit" name="dis1" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[1]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off1">Off</span>
                      <input type="checkbox" id="btn1">
                      <span class="lever"></span>
                      <span id="on1">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj1" class="material-icons yellow-text">notifications</i><span id="notificacion1">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>


                  <input type="text" name=" " id=" " value="<?php echo $dispositivo[1]; ?>">
                  <input type="button" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[2]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off2">Off</span>
                      <input type="checkbox" id="btn2">
                      <span class="lever"></span>
                      <span id="on2">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj2" class="material-icons yellow-text">notifications</i><span id="notificacion2">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>


                  <input type="text" name=" " id=" " value="<?php echo $dispositivo[2]; ?>">
                  <input type="button" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <h5 style="text-align:center;color:steelblue"><strong>Seguridad</strong></h5>
      </div>
      <div class="row">
        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[3]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off3">Off</span>
                      <input type="checkbox" id="btn3">
                      <span class="lever"></span>
                      <span id="on3">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj3" class="material-icons yellow-text">notifications</i><span id="notificacion3">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>


                  <input type="text" name=" " id=" " value="<?php echo $dispositivo[3]; ?>">
                  <input type="button" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[4]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off4">Off</span>
                      <input type="checkbox" id="btn4">
                      <span class="lever"></span>
                      <span id="on4">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj4" class="material-icons yellow-text">notifications</i><span id="notificacion4">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>


                  <input type="text" name=" " id=" " value="<?php echo $dispositivo[4]; ?>">
                  <input type="button" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col l4 m12 s12">
          <div class="row">
            <div class="col s12 m12">
              <div class="card hoverable blue-grey darken-4">
                <div class="card-content">
                  <span class="card-title activator white-text" style="font-size:medium"><strong><?php echo $dispositivo[5]; ?></strong><i class="material-icons right">more_vert</i></span>

                  <div class="switch center-align">
                    <label>
                      <span id="off5">Off</span>
                      <input type="checkbox" id="btn5">
                      <span class="lever"></span>
                      <span id="on5">On</span>
                    </label>
                  </div>

                </div>
                <div class="card-action">
                  <span class="valign-wrapper  white-text" style="font-size:small;justify-content:center"><i id="icomsj5" class="material-icons yellow-text">notifications</i><span id="notificacion5">El dispositivo está xxxxxxxx</span></span>
                </div>
                <div class="card-reveal center-align">
                  <strong> <span class="card-title grey-text text-darken-4" style="font-size:medium">Cambiar Nombre<i class="material-icons right">close</i></span></strong>
                  <input type="text" name=" " id=" " value="<?php echo $dispositivo[5]; ?>">
                  <input type="button" value="Guardar" style="font-size:medium;background-color: #01579b;" class="btn btn-small card-title text-white">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- <footer>
  <div id='coordenadas'></div> 
  </footer>
  <script type="text/javascript">
			if (navigator.geolocation) { //Validar si hay acceso web a la ubicación
				navigator.geolocation.getCurrentPosition(mostrarUbicacion); //Obtiene la posición
				} else {
				alert("¡Error! Este navegador no soporta la Geolocalización.");
			}
			
			//Funcion para obtener latitud y longitud
			function mostrarUbicacion(position) {
				var latitud = position.coords.latitude; //Obtener latitud
				var longitud = position.coords.longitude; //Obtener longitud
				var div = document.getElementById("coordenadas");
				div.innerHTML = "<br>Latitud: " + latitud + "<br>Longitud: " + longitud; //Imprime latitud y longitud
			}		
    </script> -->

  <?php
  include 'lib/tools/validacionInterruptores.php';
  ?>
  <script src="js/validacion.js"></script>

</body>

</html>