<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            border: 1px dotted #ff0000;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>Nombre de articulo</td>
            <?php
            /*
Con el require_once que hize es como si tuviera el archivo productos_controlador dentro de esta pagina
*/
            foreach ($matrizProductos as $registro) {
                echo "<tr><td>" . $registro['NOMBRE'] . "</td></tr>";
            }

            ?>
</body>

</html>