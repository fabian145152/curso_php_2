<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,
        h2 {
            text-align: center;
        }

        table {
            width: 25%;
            background-color: #ffc;
            border: 2px dotted #f00;
            margin: auto;
        }

        .izq {
            text-align: right;
        }

        .der {
            text-align: left;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <h1>Introduce tus datos</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td class="izq">Login:</td>
                <td class="der"><input type="text" name="login"></td>
            </tr>
            <tr>
                <td class="izq">Password:</td>
                <td class="der"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td class="izq">Recordar</td>
                <td class="der"><input type="checkbox" name="recordar" id="recordar"><label for="recordar"></label></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="enviar" value="LOGIN"></td>
            </tr>
        </table>
        <?php

        $autenticado = false;  // si el usuario y la pass es correcto $autentucar = true

        if (isset($_POST["enviar"])) {
            try {
                $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "belgrado");
                $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM usuarios_pass WHERE USUARIOS= :login AND PASSWORD= :password";
                $resultado = $base->prepare($sql);
                $login = htmlentities(addslashes($_POST['login']));
                $password = htmlentities(addslashes($_POST['password']));
                $resultado->bindValue(":login", $login);
                $resultado->bindValue(":password", $password);
                $resultado->execute();
                $numero_registro = $resultado->rowCount();
                if ($numero_registro != 0) {
                    //Si el  usuario le logueo correctamante entra dentro de este if
                    $autenticado = true;
                    if (isset($_POST['recordar'])) {
                        setcookie("nombre_usuario", $_POST['login'], time() + 86400);
                    }
                } else {
                    echo "Error de usuario o contraseña";
                }
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }

        ?>
        <?php
        /*
        Si es la primera vez que el usuario entra a la pagina es obvio que $autenticado
        es = a false y no ha creado la cookie entonces va al include

    */
        if ($autenticado == false) {
            if (!isset($_COOKIE["nombre_usuario"])) {
                include("Formulario.html");
            }
        }

        ?>
</body>

</html>