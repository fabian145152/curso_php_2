<?php

class Conectar
{
    public static function coneccion()
    {
        try {
            $coneccion = new PDO('mysql:host=localhost; dbname=pruebas', 'root', 'belgrado');
            $coneccion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $coneccion->exec("SET CHARACTER SET UTF8");
        } catch (Exception $e) {
            die("Error" . $e->getMessage());
            echo "Linea del error" . $e->getLine();
        }
        return $coneccion;
    }
}
