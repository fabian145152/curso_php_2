<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $id = "";
    $contenido = "";
    $tipo = "";


    require("conecta.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pass);
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar";
        exit();
    }
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT * FROM archivos WHERE id =4";

    $resultado = mysqli_query($conexion, $consulta);
    while ($fila = mysqli_fetch_array($resultado)) {

        $id = $fila['id'];
        $contenido = $fila['contenido'];
        $tipo = $fila['tipo'];
    }

    echo "<br>";
    echo "id: " . $id;
    echo "<br>";
    echo "Tipo: " . $tipo;
    echo "<br>";
    echo "<img src='data:image/png; base64, " . base64_encode($contenido) . "'>";


    ?>



</body>

</html>