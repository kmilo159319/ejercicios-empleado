<?php

include 'conexion.php';




$consultar= "select * from empleado;";
$ejecutar = mysqli_query($conectar,$consultar);


foreach($ejecutar as $indiceb => $valueb)
{
     $datab[$indiceb] = $valueb;  
};
$id = array_column($datab,'idempleado');
$nombre = array_column($datab, 'nombre_empleado');
$idroll = array_column($datab, 'idusuario');

$consultar2 = "SELECT *
FROM actividades 
INNER JOIN empleado
ON actividades.idempleado = empleado.idempleado
INNER JOIN rollusuarios
ON rollusuarios.idusuario = empleado.idusuario;";
$ejecutar2 = mysqli_query($conectar,$consultar2);

foreach($ejecutar2 as $indicea => $valuea)
{
     $dataa[$indicea] = $valuea;  
}

$idactividad = array_column($dataa, 'idactividad');
$descripcion = array_column($dataa, 'descripcion');
$empleado = array_column($dataa, 'nombre_empleado');
$roll = array_column($dataa, 'rolldescripcion');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>actividades para empleados</title>
</head>
<body>
    <div class="contenido">
    <form action="./crearusuario.php" method="post" id="formulario">
    <br>
  <label for="">ingrese un nombre</label>
  <br>
  <br>
  <input type="text" name="nombre">
  <br>
  <br>
  <label for="">ingrese un roll:</label>
<input list="roll" name="roll">
  <datalist id="roll">
   <option value= "administrador" >
   <option value= "empleado" >
</datalist>
        <br>
        <br>
        <br>
        <input type="submit" class="btn" value="agregar">
    </form>
    <br>

    <form action="/ejercicio_php/asignaractividad.php" method="post" id="formulario">
    <br>

    <label for="">por favor seleccione su nombre</label>
  <br>
  <input list="usuario" name="rollusuario">
  <datalist id="usuario">
   <?php for($x=0;$x <= $indiceb;$x++){?>
   <option value= "<?php printf($nombre[$x]) ?>" >
   <?php } ?>
</datalist>
  <br>
  <label for="">por favor asigne una tarea a alguno de los empleados</label>
  <br>
  <input list="usuario" name="usuario">
  <datalist id="usuario">
   <?php for($x=0;$x <= $indiceb;$x++){?>
   <option value= "<?php printf($nombre[$x]) ?>" >
   <?php } ?>
</datalist>
<br>
<label for="">actividad:</label>
  <br>
  <input type="text" name="actividad">
        <br>
        <br>
        <input type="submit" class="btn" value="agregar">
    </form>
</div>
<div class="resultado">
    <table class="resultados">
        <thead>
        <tr>
        <th>codigo:</th>
        <th>nombre:</th>
        <th>roll del usuario (0:administrativo, 1:empleado):</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i <= $indiceb;$i++){?>
          <tr>  
	<td><?php printf($id[$i]) ?></td>
    <td><?php printf($nombre[$i])?></td>
    <td><?php printf($idroll[$i]) ?></td>
	</tr>
<?php } ?>
        </tbody>
    </table>
    <table class="resultados2">
        <thead>
        <tr>
        <th>actividad No:</th>
        <th>actividad:</th>
        <th>empleado</th>
        <th>roll</th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i <= $indicea;$i++){?>
          <tr>  
	<td><?php printf($i + 1) ?></td>
    <td><?php printf($descripcion[$i])?></td>
    <td><?php printf($empleado[$i]) ?></td>
    <td><?php printf($roll[$i]) ?></td>
    <td>
    <br>    
    <br>
    <form action="borrar-actividad.php" method="post">
<input name="borrar" type="hidden" value="<?php printf($idactividad[$i])?>" />
<input class="btn" id="btnt" type="submit" value="Borrar Registro" /></form></td>
	</tr>
<?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>






