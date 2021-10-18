<?php
include_once("objeto_blog.php");
class Manejo_Objetos
{
    private $conexion;
    public function __construct($conexion)
    {
        $this->setConexion($conexion);
    }
    public function setConexion(PDO $conexion)
    {
        $this->conexion = $conexion;
    }

    public function getContenidoPorFecha()
    {
        $matriz = array();  //las entradas se almacenan en $matriz
        $contador = 0;      //para ir de la 1 a la 2 de la 2 a la 3 y asi uso el contador
        $resultado = $this->conexion->query("SELECT * FROM contenido ORDER BY fecha DESC");
        while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $blog = new Objeto_blog();

            $blog->setId($registro["id"]);
            $blog->setTitulo($registro["titulo"]);
            $blog->setFecha($registro["fecha"]);
            $blog->setComentario($registro["comentario"]);
            $blog->setImagen($registro["imagen"]);

            $matriz[$contador] = $blog; //almacene un objeto con todas $blog con todas sus propiedades en la variable %matriz
            $contador++;    //incremento la variable $contador crea un segundo objeto con todas las propiedades y 
            //lo almacena en la siguiente posicion de matriz $blog.
            //y asi vamos almacenando en la matriz $blog tantos objetos como registros hay en la BBDD
        }
        return $matriz;
    }
    public function insertaContenido(Objeto_blog $blog)
    {
        $sql = "INSERT INTO contenido (titulo, fecha, comentario, imagen) VALUES ('" . $blog->getTitulo() . "','" . $blog->getFecha() . "
                  ','" . $blog->getComentario() . "
                  ','" . $blog->getImagen() . "')";
        $this->conexion->exec($sql);
    }
}
