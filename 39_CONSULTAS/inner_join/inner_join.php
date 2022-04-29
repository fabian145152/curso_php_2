<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INNER JOIN</title>
    <style>
        table {
            width: 100%;
        }

        th,
        td {
            width: 20%;
        }
    </style>
</head>

<body>

    <?php

    $conexion = new mysqli("localhost", "root", "belgrado", "practicas_consultas");

    if ($conexion->connect_errno) {
        echo "Fallo la coneccion" . $conexion->connect_errno;
    }

    $conexion->set_charset("utf8");

    $sql = "SELECT * FROM empleados INNER JOIN departamentos ON empleados.d_id = departamentos.d_id";

    $resultados = $conexion->query($sql);
    if ($conexion->errno) {
        die($conexion->errno);
    }

    echo "<p>En este caso la tabla de empleados tiene que tener un registro que esta relacionado con la tabla departamentos</p>";
    echo "<p>. 'SELECT * FROM empleados INNER JOIN departamentos ON empleados.d_id = departamentos.d_id' . </p>";

    while ($fila = $resultados->fetch_assoc()) {
        echo "<table><tr><td>";
        echo $fila['apellidos'] . "</td><td>";
        echo $fila['nombre'] . "</td><td>";
        echo $fila['telefono'] . "</td><td>";
        echo $fila['denominacion'] . "</td><td>";
        echo $fila['localizacion'] . "</td><td></tr></table>";
        echo "<br>";
    }

    $conexion->close();

    ?>

</body>

</html>