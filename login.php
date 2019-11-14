<?php
include 'Conex.php';

session_start();

if (isset($_SESSION["idusuario"])) {
    header("location:index.php");
}

$respuesta = "";

if (isset($_POST["login"])) {

    if (isset($_POST["usuario"])) {
        $RslistUser = mysqli_query($cn, "select * from usuarios where NomUser='" . $_POST["usuario"] . "'  and Password='" . $_POST["password"] . "'");
        $data = mysqli_fetch_assoc($RslistUser);
        if (mysqli_num_rows($RslistUser) > 0) {

            $_SESSION["idusuario"] = $data["IdUsuario"];
            $_SESSION["usuario"] = $data["Nombres"] . " " . $data["Apellidos"];
            $_SESSION["Correo"] = $data["Correo"];
            $_SESSION["Img"] = $data["Img"];
            header('location:index.php');
        } else {
            $respuesta = "Contraseña incorrecta";
        }
    }
}

$RsUser = mysqli_query($cn, "select * from usuarios");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/Home.png" />
    <link rel="stylesheet" href="lib/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="lib/jquery/jquery-3.4.1.min.js"></script>
    <script src="lib/materialize/js/materialize.min.js"></script>
    <title>Document</title>
</head>

<body class="light-blue darken-4">
    <div class="section"></div>
    <main>
        <center>
            <img class="responsive-img" style="width: 150px;" src="img/logo.png" />
            <h5 class="white-text">Por favor, ingrese con su cuenta</h5>
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row marco" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" method="post" action="">
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <select class="icons" name="usuario">
                                    <option value="" disabled selected>Seleccione Usuario</option>
                                    <?php
                                    while ($item = mysqli_fetch_array($RsUser)) {
                                        echo "<option value='" . $item["NomUser"] . "' data-icon='" . $item["Img"] . "'>" . $item["Nombres"] . "</option>";
                                    }
                                    ?>
                                </select>
                                <label for='email'>Seleccione su usuario</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <label for='password'>Ingrese su password</label>
                            </div>
                            <label style='float: right;'>
                                <a class='pink-text' href='#!'><b>¿Olvidó su contraseña?</b></a>
                            </label>
                        </div>
                        <div class='row'>
                            <div class='input-field col s12'>
                                <span style="color:green; font-size: 15px;"><?php echo $respuesta ?></span>
                            </div>
                        </div>

                        <center>
                            <div class='row'>
                                <button type='submit' name='login' class='col s12 btn btn-large waves-effect light-blue darken-4'>Ingresar</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
            <!-- <a href="#!">Create account</a> -->
        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>
    <script src="js/validacion.js"></script>
</body>

</html>