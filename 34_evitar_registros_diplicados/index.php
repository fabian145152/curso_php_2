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
      <a class="navbar-brand" href="./">BaulPHP</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="./">INICIO <span class="sr-only">(current)</span></a></li>
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
      <form action="main.php" method="post">
        <div class="form-group">
          <label for="name1">Nombres</label>
          <input type="text" name="name" placeholder="Ingrese Nombre"  class="form-control"/>
        </div>
        <div class="form-group">
          <label for="name1">E-Mail</label>
          <input type="text" name="email" placeholder="Ingrese Email" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="name1">Contraseña</label>
          <input type="password" name="password" placeholder="********" class="form-control"/>
        </div>
        <div class="form-group">
          <input type="submit" name="submit_registro" value="REGISTRARME" class="btn btn-primary"/>
        </div>
      </form>
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