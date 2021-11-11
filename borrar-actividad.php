<?php
  
include 'conexion.php';

$borrar = $_POST['borrar'];




$consultar= "delete from actividades where idactividad = $borrar;";
$ejecutar = mysqli_query($conectar,$consultar);

if(!$ejecutar){
  echo "<script >
  alert('advertencia!,se encontro un error al guardar');
  document.location=('consultarusuario.php');
  </script>";
}else{
  echo "<script >
  alert('advertencia!, el registro fue borrado exitosamente');
  document.location=('consultarusuario.php');
  </script>";
}



?>