<?php

$hostname='127.0.0.1:3308';
$username='administrador';
$password='Desarrollo2021';
$dbname='tareasempleados';


$conectar = mysqli_connect($hostname,$username,$password,$dbname);

if(!$conectar){
    
    echo "'se encontro un error al intentar conectar con el servidor";
}


?>