<?php

class Personas_modelo
{
    private $db;           //guardo la coneccion e interactuo con la coneccion
    private $personas;    //guardo los productos de la tabla productos
    public function __construct()  //este constructor se encarga de conectar
    {
        require_once("modelo/conectar.php"); //incluyo el archivo
        //cambie esta ruta tambien
        $this->db = Conectar::coneccion();
        $this->personas = array();
    }
    public function get_personas() //nos devuelve los productos o articulos que hay n la tabla
    {
        require("paginacion.php");  //Agregado para el Limit de la consulta de tamaño de pagina
        $consulta = $this->db->query("SELECT * FROM datos_usuarios LIMIT $empezar_desde, $tamagno_pagina");    //en un array $consulta tenemos todos los productos de la tabla
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->personas[] = $filas;
        }
        return $this->personas;    //Nos devuelve el array productos
    }
}
