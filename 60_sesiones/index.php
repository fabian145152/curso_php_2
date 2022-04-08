<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zapatillas</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/arrow.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Quattrocento&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <h1>GALERIA DE PRODUCTOS</h1>
        <hr>
    </header>
    <section id="main">

        <ul class="galery">
            <?php
            //compio la coneccion a la base de otra pagina y le corrijo los link
            include_once 'includes/db.php';
            $con = openCon('config/db_products.ini');
            $con->set_charset("utf8mb4");

            $sql = "SELECT s.model as model, 
                           s.price as price, 
                           s.images as image, 
                           s.observacion, 
                           c.description as color, 
                           b.description as brand, 
                           s.free_sheeping as envio,
                           date_format (s.fecha_alta, '%d-%m-%Y') as fecha_alta 
            FROM sneakers s 
            INNER JOIN brand b ON s.id_brand =b.id_brand 
            INNER JOIN color c ON s.id_color=c.id_color 
            ORDER BY s.fecha_alta";

            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>
                <li>
                    <div class="box">
                        <figure>
                            <img src="<?php echo substr($row['image'], 3) ?>">
                            <figcaption>
                                <h3><?php echo $row['brand'] . ' ' . $row['model']  . '<br>' . $row['color'] ?></h3>

                                <h3><?php if ($row['Envio Gratis'] = 'envio') {
                                            echo $row['envio'];
                                        } ?></h3>


                            </figcaption>
                            <p><?php echo "$" . $row['price'] . '-' ?> </p>
                            <time><?php echo $row['fecha_alta'] ?></time>

                            <!-- con el substr (     ,3)  le saco ..// de adelante de la ruta cuando cargo la imagen  -->
                        </figure>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>


    </section>
    <footer>
        <div id="acceso">
            <a href="form-login.html" target="_blank">Clientes</a>
        </div>
        <hr>
        <h3 id="footer-text">Copyrigth 2019</h3>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div class="arrow">
        <a href="#" id="toTop">
            <img src="images/backToTop.png" alt="flecha">
            <img class="top" src="images/backToTop.png" alt="flecha">
        </a>
    </div>

    <script src="js/main.js"></script>
</body>

</html>