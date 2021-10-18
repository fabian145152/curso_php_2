<?php

require_once("modelo/personas_modelo.php"); //voy a utilizar estos archivos

$persona = new Personas_modelo();      //Llamo a este metodo

$matrizPersonas = $persona->get_personas();

require_once("vista/personas_view.php");    //aca tengo todo el archivo view que todavia no escribi
/*
    Todas las rutas tienen que apuntar desde el idex porque si no da error

*/