<?php

require_once("modelo/productos_modelo.php"); //voy a utilizar estos archivos

$producto = new Productos_modelo();      //Llamo a este metodo

$matrizProductos = $producto->get_productos();

require_once("vista/productos_view.php");    //aca tengo todo el archivo view que todavia no escribi
/*
    Todas las rutas tienen que apuntar desde el idex porque si no da error

*/