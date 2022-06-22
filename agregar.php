<?php

include 'conexion.php';

if (isset($_POST['id'])){
    $id = $_POST['id'];
} else {
    $id = "NULL";
}

$prenda = strtolower($_POST['prenda']);
$marca = strtolower($_POST['marca']);
$talle = strtolower($_POST['talle']);
$precio = strtolower($_POST['precio']);

$imagen = $_POST['imagen'];

$color = strtolower($_POST['color']);

if (isset($_POST['link'])){
    $link = strtolower($_POST['link']);
    $link = "NULL";

} else {
    $link = "NULL";
}


$consulta = "INSERT INTO ropa (id, prenda, marca, talle, precio, color) VALUES (".$id.", '".$prenda."', '".$marca."', '".$talle."', '".$precio."', '".$color."')";

mysqli_query($conexion, $consulta);
header('location: admin.php');

?>