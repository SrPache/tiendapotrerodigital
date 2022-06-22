<?php

include 'conexion.php';
$id = $_GET['id'];
$consulta = "DELETE FROM ropa WHERE ropa.id = ".$id;
// print "<p>".$consulta."</p>";
mysqli_query($conexion, $consulta);
header('location: admin.php');

?>