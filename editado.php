<?php
include 'conexion.php';

$id = $_POST['id'];
$prenda = $_POST['prenda'];
$marca = $_POST['marca'];
$talle = $_POST['talle'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$link = $_POST['link'];

$consulta = "UPDATE ropa SET id = '".$id."', prenda = '".$prenda."', marca = '".$marca."', talle = '".$talle."', precio = '".$precio."', color = '".$color."', link = '".$link."' WHERE ropa.id = ".$id;

// print '<p>'.$consulta.'</p>';
mysqli_query($conexion, $consulta);
header('location: admin.php');

?>