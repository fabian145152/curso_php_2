<?php
if (isset($_POST["submit_registro"])) {
  $servername = "localhost";
  $username = "root";
  $password = "belgrado";
  $dbname = "pruebas";

  // Creamos la conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Revisamos la conexión
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  // Realizamos la consulta para saber si coincide con uno de esos criterios
  $sql = "SELECT * FROM usuarios_repetidos WHERE name='$name' OR email='$email' OR password='$pass'";
  $result = mysqli_query($conn, $sql);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Evitar Contenido Duplicado PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
  </head>

  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="./">BaulPHP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="./">INICIO <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Evitar Contenido Duplicado</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel-body">


          <?php
          // Validamos si hay resultados
          if (mysqli_num_rows($result) > 0) {
            // Si es mayor a cero imprimimos que ya existe el usuario
            echo "Ya existe el registro que intenta registrar";
          } else {
            // Si no hay resultados, ingresamos el registro a la base de datos
            $sql2 = "INSERT INTO usuarios_repetidos(name, email, password)VALUES ('$name', '$email', '$pass')";
            if (mysqli_query($conn, $sql2)) {
              // Imprimimos que se ingreso correctamente
              echo "Nuevo Registro Creado Exitosamente.";
            } else {
              // Mostramos si hay algun error al insertar registro
              echo "Error: " . $sql2 . "" . mysqli_error($conn);
            }
          }
          // Cerramos la conexión
          $conn->close();
        }
          ?>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="container">
        <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
      </div>
    </div>
  </body>

  </html>