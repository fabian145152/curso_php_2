<?php

require_once("conectar.php");   //esta linea se agrega por la variable base 
//tiene que estar conectado por la consulta que hace abajo

$base = Conectar::coneccion();  //llamo a la coneecion base asi reconoce la variable

//--------------------Paginacion---------------------

$tamagno_pagina = 3;    //cantidad de registros por pagina

//--------------Sigue aca desde abajo de todo--------------
if (isset($_GET["pagina"])) {
    //con el isset que se ejecute una vez pulsado el promernumero, porque si no ma da que la variable pagina no esta definida.
    if ($_GET["pagina"] == 1) {

        header("Location:index.php");
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

$sql_total = "SELECT * FROM DATOS_USUARIOS";
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

//--------------------Fin Paginacion-----------------