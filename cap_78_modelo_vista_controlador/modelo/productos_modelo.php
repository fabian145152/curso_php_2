<?php

class Productos_modelo
{
    private $db;           //guardo la coneccion e interactuo con la coneccion
    private $productos;    //guardo los productos de la tabla productos
    public function __construct()  //este constructor se encarga de conectar
    {
        require_once("modelo/conectar.php"); //incluyo el archivo
        //cambie esta ruta tambien
        $this->db = Conectar::coneccion();   
        $this->productos = array();
    }
    public function get_productos() //nos devuelve los productos o articulos que hay n la tabla
    {
        $consulta = $this->db->query("SELECT * FROM productos");    //en un array $consulta tenemos todos los productos de la tabla
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->productos[] = $filas;
        }
        return $this->productos;    //Nos devuelve el array productos
    }
}
