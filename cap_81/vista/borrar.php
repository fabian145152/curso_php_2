<?php

include("conectar.php");
$base = Conectar::coneccion();  //llamo a la coneecion base asi reconoce la variable

$id = $_GET["id"];

$base->query("DELETE FROM datos_usuarios WHERE id='$id'");

header("location:../index.php");
