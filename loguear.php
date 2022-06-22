<?php

$usuario = $_POST['user'];
$contrasenia = $_POST['pass'];

if ($usuario == 'potrero' and $contrasenia == '2424'){
    header('location: admin.php');
} else { 
    header('location: https://youtu.be/5W7-Yq0hTQI?t=6');
}

?>