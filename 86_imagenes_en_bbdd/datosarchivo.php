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



    $nombre_archivo = $_FILES["archivo"]["name"];  //viene del index 
    $tipo_archivo = $_FILES["archivo"]["type"];
    $tamagno_archivo = $_FILES["archivo"]["size"];

    echo $nombre_archivo;
    echo "<br>";
    echo $tipo_archivo;
    echo "<br>";
    echo $tamagno_archivo;
    echo "<br>";

    if ($tamagno_archivo <= 10000000) {     //la carga del archivo se lleva a cabo si en menor a 3000000 de bytes

        // if ($tipo_archivo == "image/jpg" || $tipo_archivo == "image/jpeg" || $tipo_archivo == "image/png" || $tipo_archivo == "image/gif") {

        //Es la ruta de la carpeta donde se guardaran las imagnenes
        $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . '/curso_php_2/86_imagenes_en_bbdd/archivos/';

        //Movemos la imagen de la carpeta temporal a la carpeta de destino
        move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo);
        // } else {
        //  echo "Solo se pueden subir imagenes jpg/jpeg/png/gif";
        //  }
    } else {
        echo "<br>El archivo no debe superar los 10MB";
    }

    require("conecta.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_pass);
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar";
        exit();
    }
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion, "utf8");

    $archivo_objetivo = fopen($carpeta_destino . $nombre_archivo, "r");     // la r es solo lectura

    $contenido = fread($archivo_objetivo, $tamagno_archivo);

    $contenido = addslashes($contenido);

    fclose($archivo_objetivo);


    $sql = "INSERT INTO archivos (id, nombre, tipo, contenido) VALUES (0, '$nombre_archivo', '$tipo_archivo' , '$contenido') ";
    //$sql = "UPDATE PRODUCTOS SET FOTO='$nombre_archivo' WHERE CODIGOARTICULO='AR01'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_affected_rows($conexion) > 0) {
        echo "Se ha insrtado el registro";
    } else {
        echo "No se pudo insrtar el archivo";
    }
    ?>
    <br>
    <a href="index.php">Inicio</a>
</body>

</html>