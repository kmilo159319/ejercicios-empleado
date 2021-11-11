<?php
  
include 'conexion.php';

$usuario = $_POST['usuario'];
$actividad = $_POST['actividad'];
$rollusuario = $_POST['rollusuario'];

$consultarid = "select idempleado from empleado where nombre_empleado = '$usuario';";
$searchusuario = mysqli_query($conectar,$consultarid);
$datoempleado = mysqli_fetch_array($searchusuario);
$idempleado = $datoempleado[0];

$consultarroll = "select idusuario from empleado where nombre_empleado = '$rollusuario';";
$searchroll = mysqli_query($conectar,$consultarroll);
$datoroll = mysqli_fetch_array($searchroll);
$idroll = $datoroll[0];

$consultar= "insert into actividades values('','$actividad',$idempleado);";
if($idroll === '0'){
$ejecutar = mysqli_query($conectar,$consultar);
if(!$ejecutar){
     echo "<script >
     alert('advertencia!, hubo un error al intentar guardar la informacion');
     document.location=('consultarusuario.php');
     </script>";
}else{
     echo "<script >
     alert('advertencia!, la informacion fue guardada exitosamente');
     document.location=('consultarusuario.php');
     </script>";
}
}else {
     echo "<script >
     alert('advertencia!, no tiene permisos para realizar esta accion');
     document.location=('consultarusuario.php');
     </script>";
};


?>