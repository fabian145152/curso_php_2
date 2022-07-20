<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ejemplo de UNION ALL</h1>
    <?php



    $conexion = new mysqli("localhost", "root", "belgrado", "practicas_consultas");
    if ($conexion->connect_errno) {
        echo "Fallo de coneccion " . $conexion->connect_errno;
    }

    //mysqli_set_charset($conexion, "utf8");   //forma prsedimental

    //con POO

    echo "// SELECT * FROM `productos` WHERE seccion='DEPORTES' UNION ALL SELECT * FROM `productosnuevos` WHERE SECCION='DEPORTES DE RIESGO'";

    $conexion->set_charset("utf8");


    $sql = " SELECT * FROM `productos` WHERE seccion='DEPORTES' UNION ALL SELECT * FROM `productosnuevos` WHERE SECCION='DEPORTES'";


    $resultados = $conexion->query($sql);
    if ($conexion->errno) {
        die($conexion->errno);
    }

    while ($fila = $resultados->fetch_assoc()) {
        echo "<table><tr><td>";
        echo $fila['CODIGOARTICULO'] . "</td><td>";
        echo $fila['SECCION'] . "</td><td>";
        echo $fila['NOMBREARTICULO'] . "</td><td>";
        echo $fila['PRECIO'] . "</td><td>";
        echo $fila['FECHA'] . "</td><td>";
        echo $fila['PAISDEORIGEN'] . "</td><td>";
        echo "</tr></table>";
        echo "<br>";
    }

    $conexion->close();

    ?>

</body>

</html>