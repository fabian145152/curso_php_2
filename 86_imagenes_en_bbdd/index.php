<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }

        table {
            margin: auto;
            width: 450px;
            border: 2px dotted #f00;
        }
    </style>
</head>

<body>
    <h1>Seguir por el video 84</h1>
    <form action="datosarchivo.php" method="post" enctype="multipart/form-data">
        <!-- El enctype="multipart/form-data" es para tratar imagenes, si no va anada es texto -->
        <table>
            <tr>
                <td><label for="imagen">Imagen:</label></td>
                <td><input type="file" name="archivo" size="20"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center"><input type="submit" value="Enviar Archivo"></td>
            </tr>
        </table>

    </form>
    <a href="leer_archivo.php">Leer archivo</a>

    <p>Este programa guarda el archivo en la bbdd, no es aconsejable por el peso que va a tener la bbdd.</p>
    <p>Se puede hacer asi cuando son pocas imagenes, asi cuando exporto la bbdd exporto tambien todas las imagenes.</p>
    <p>Lo mejor es hacer como en el programa anterior, guardar el archivo en una carpeta del servidor y en la bbdd la ruta.</p>
</body>

</html>