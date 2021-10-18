<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../vista/Formulario.php">Volver</a>
    <?php

    include("../modelo/manejo_objetos.php");

    try {
        $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog', 'root', 'belgrado');
        $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $manejo_Objetos = new Manejo_Objetos($miconexion);

        $tabla_blog = $manejo_Objetos->getContenidoPorFecha();
        if (empty($tabla_blog)) {
            echo "No hay entradas de blog todavia";
        } else {
            foreach ($tabla_blog as $valor) {     //recorro posicion a osicion de el array $tabla_blog
                echo "<h3>" . $valor->getTitulo() . "</h3>";
                echo "<h4>" . $valor->getFecha() . "</h4>";
                echo "<div style='width:400px'>";
                echo $valor->getComentario() . "</div>";
                if ($valor->getImagen() != "") {
                    echo "<img src='../imagenes/";
                    echo $valor->getImagen() . "' width='300px' height='200px'/>";
                }
                echo "<hr/>";
            }
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }


    ?>
    <br>
    <a href="formulario.php">Volver.</a>
</body>

</html>