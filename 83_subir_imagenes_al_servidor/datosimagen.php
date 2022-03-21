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

    /*
recibims los datos de la imagen
se puede guardar 
name 
type 
size 
tmp_name aca de puede obtener el nombre de la carpeta temporal
error   propiedad por si no va el archivo
*/

    $nombre_imagen = $_FILES["imagen"]["name"];  //viene del index 
    $tipo_imagen = $_FILES["imagen"]["type"];
    $tamagno_imagen = $_FILES["imagen"]["size"];
    echo $tamagno_imagen = $_FILES["imagen"]["size"];
    echo "<br>";
    echo $tipo_imagen;

    if ($tamagno_imagen <= 3000000) {     //la carga del archivo se lleva a cabo si en menor a 3000000 de bytes

        if ($tipo_imagen == "image/jpg" || $tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {

            //Es la ruta de la carpeta donde se guardaran las imagnenes
            $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . '/curso_php_2/83_subir_imagenes_al_servidor/imagenes/';

            //Movemos la imagen de la carpeta temporal a la carpeta de destino
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);
        } else {
            echo "Solo se pueden subir imagenes jpg/jpeg/png/gif";
        }
    } else {
        echo "<br>El archivo no debe superar los 2MB";
    }
    echo "<br>";
    echo "<a href='index.php'>Inicio</a>";
    echo "<br>";
    echo "<br>";
    echo "<a href='leer_imagen.php'>Ver las imagenes</a>";

    require("conecta.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pass);
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar";
        exit();
    }
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");
    //$sql = "INSERT INTO PRODUCTOS (FOTO) VALUES ('$nombre_imagen') ";
    $sql = "UPDATE PRODUCTOS SET FOTO='$nombre_imagen' WHERE CODIGOARTICULO='AR01'";
    $resultardos = mysqli_query($conexion, $sql);

    ?>
</body>

</html>