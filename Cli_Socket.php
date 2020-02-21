<?php
$i = 0;
$host = '127.0.0.1';
$port = '25003';
while ($i < 1) {
    if (!isset($_POST['mensaje'])) {
        $message = "---";
    } else {
        $message = $_POST['mensaje'];
    }
    $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("No se creó Socket");
    $result = socket_connect($socket, $host, $port) or die("No se conectó a servidor");
    socket_write($socket, $message, strlen($message)) or die("No se envió data");

    $result = socket_read($socket, 1024) or die("No hay respuesta");
    echo $result . "\n";
    socket_close($socket);
    $i++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="mensaje" id="mensaje">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>