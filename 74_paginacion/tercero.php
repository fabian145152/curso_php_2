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

    try {

        $base = new PDO("mysql:host=localhost; dbname=pruebas", "root", "belgrado");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");


        $tamagno_pagina = 3;    //cantidad de registros por pagina

        //--------------Sigue aca desde abajo de todo--------------
        if (isset($_GET["pagina"])) {
            //con el isset que se ejecute una vez pulsado el promernumero, porque si no ma da que la variable pagina no esta definida.
            if ($_GET["pagina"] == 1) {

                header("Location:tercero.php");
            } else {

                $pagina = $_GET["pagina"];
            }
        } else {
            $pagina = 1;
        }
        //---------------------------------------------------------

        $empezar_desde = ($pagina - 1) * $tamagno_pagina;
        //si pulso el 3 pagina =3 con el metodo get, 3-1=2 y 2*3 =6
        //guardo en la variable el numero 6 para que lo sustituya en el limit
        //limit 6, 3 

        $sql_total = "SELECT NOMBRE, SECCION, PRECIO, PAISDEORIGEN FROM PRODUCTOS WHERE SECCION ='DEPORTES' ";
        /*
        Para paginar agrego LIMIT, 2 parametros primer registro y cantidad de registros.
        Lo primero que necesito es saber cuantos registros tiene la tabla
        y en cuantas paginas lo va a dividir.
        Creo variable $tamagno_pagina
        
        
        */
        $resultado = $base->prepare($sql_total);
        $resultado->execute(array());
        $num_filas = $resultado->rowCount();    //cuenta la cantidad de filas
        $total_paginas = ceil($num_filas / $tamagno_pagina);  //me dice la cantidad de paginas que voy a tener
        //el ceil me da un numero entero
        echo "Numero de registros de la consulta: " . $num_filas . "<br>";
        echo "Mostramos " . $tamagno_pagina . " registros por pagina." . "<br>";
        echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<br>" . "<br>";

        $resultado->closeCursor();

        $sql_limite = "SELECT NOMBRE, SECCION, PRECIO, PAISDEORIGEN FROM PRODUCTOS WHERE SECCION ='DEPORTES' LIMIT $empezar_desde, $tamagno_pagina";
        //el $tamagno_pagina lo pongo para que despues pueda cambiar el valor de la variable y modificar el tama??o de la pagina.
        $resultado = $base->prepare($sql_limite);
        $resultado->execute(array());


        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "Nombre Articulo: " . $registro["NOMBRE"] . " Seccion: " . $registro["SECCION"] . " Precio: " . $registro["PRECIO"] . " Pais de origen: " . $registro["PAISDEORIGEN"] . "<br>";
        }
    } catch (exception $e) {
        echo "Linea del error: " . $e->getLine();
    }
    // --------------------------------------------------------
    //aca empieza la parte de abajo con los numeros y saltos de pagina
    echo "<br>";
    for ($i = 1; $i <= $total_paginas; $i++) {

        echo "<a href='?pagina=" . $i . "'>" . $i . "</a> ";
        //$i tiene que ser un link y lo paso por la url


    }

    ?>
</body>

</html>