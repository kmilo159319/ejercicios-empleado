<?php
  
include 'conexion.php';



$nombre = $_POST['nombre'];
$roll = $_POST['roll'];

if ($roll === 'administrador'){
    $roll = 0;
}else{
    $roll = 1;
};


$consultar= "insert into empleado values('','$nombre',$roll);";

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
?>