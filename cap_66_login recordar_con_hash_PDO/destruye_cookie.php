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
Esto es para detruir la cookie para probar
*/

    setcookie("nombre_usuario", "prueba", time() - 1);
    echo "Cookie destruida";

    ?>
</body>

</html>