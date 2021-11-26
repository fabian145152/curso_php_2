<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Modelo Vista Controlador</h1>
    <h1>Ver la lista mas abajo</h1>
    <?php

    require_once("controlador/productos_controlador.php");

    ?>
    <h2>Que es:</h2>
    <ol>
        <li>Es tomar un patron de diseño de aplicaciones</li>
        <li>Separar la logica del programa de la interfaz de usuario</li>
    </ol>
    <h2>Ventajas</h2>
    <ul>
        <li>Mas funcional</li>
        <li>Facil de mantener</li>
        <li>Mas escalable</li>
    </ul>
    <h2>Como separar la logica de la interfaz</h2>
    <ul>
        <li>Dividiendo la App en 3 partes o "Capas"</li>
        <ul>
            <li>Model (El modelo): Aqui van las clases y metodos que comunican con la BBDD</li>
            <li>View (La vista): Aqui va todo lo referente a la interfaz que mostrara la informacion al usuario.</li>
            <li>Controler (EL controlador): Intermediario entre la vista y el modelo.</li>
        </ul>
    </ul>

    <h3>Se crean 3 carpetas una modelo otra vista otra controlador</h3>
    <h3>En el directorio principal se encuentra un index que es donde comienza todo</h3>
    <p>Asi es el framework</p>
    <p>Es conveniente dibujar con lapiz y papel como va a funcionar la aplicacion</p>
    <ol>
        <h3>Pasos</h3>
        <li>En Modelo. Creo la coneccion en el archivo conectar php</li>
        <li>Creo las clases, los constructores y los destructores en la capa modelo productos_modelo y siempre uso esa nomenclatura para no equivocarse. _controlador _modelo _vista</li>
        <li>Sigo elaborando el controlador _controlador</li>
        <li>Luego Productos en la capa controlador</li>
        <li>Luego a view donde ya tiene que ser un archivo html posrque es el que el usuario ve y está la interfaz de usuario </li>
    </ol>
    <ul>
        <li>Self hace referencia a la clase actual y se usando cuando instancia dicha clase, es decir se usan métodos estáticos.</li>
        <li>This hace referencia al objeto actual, es decir, cuando una clase si tiene instancia. No se puede hacer referencia a métodos estáticos usando this pero si a métodos públicos, privados y protegidos.</li>
    </ul>
</body>

</html>