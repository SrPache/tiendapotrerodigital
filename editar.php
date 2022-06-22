<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'?>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php include 'conexion.php'?>
    <header id="header">
        <div class="max">
            <a href="admin.php">
                <h1>Tienda Potrero</h1>
            </a>
            <nav id="nav">
                <a href="login.php" class="font-awesome"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
            </nav>
        </div>
    </header>
    <?php
    include 'conexion.php';
    $id = $_GET['id'];
    $consulta = "SELECT * FROM ropa WHERE id=".$id;
    $datos = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($datos);
    ?>

    <main id="products">
        <div class="max">
        <form class="product" method="POST" action="editado.php">
            <label for="imagen" id="label-imagen" style="padding: 0 1rem; background:none;"><?php
            print '<img src="data:image/png; base64,'.base64_encode($fila['imagen']).'" alt="No se puede cambiar la imagen en este momento">'
            ?></label>
            <input class="form-editable" type="text" name="id" id="id" value=<?php print '"'.$id.'"' ?> readonly hidden >
            <input class="form-editable" type="text" name="prenda" id="prenda" placeholder="Tipo de prenda" required value= <?php print '"'.$fila['prenda'].'"'?>  autofocus>
            <input class="form-editable" type="text" name="marca" id="marca" placeholder="Marca" value=<?php print '"'.$fila['marca'].'"'?> required>
            <input class="form-editable" type="text" name="talle" id="talle" placeholder="Talle" value=<?php print '"'.$fila['talle'].'"'?> required>
            <input class="form-editable" type="text" name="color" id="color" placeholder="Color" value=<?php print '"'.$fila['color'].'"'?> required>
            <input class="form-editable" type="number" name="precio" id="precio" placeholder="Precio" value=<?php print '"'.$fila['precio'].'"'?> required>
            <input class="form-editable" type="text" name="link" id="link" placeholder="Link de pago" value=<?php print '"'.$fila['link'].'"'?>>

            <button type="submit" id="agregar">Editar</button>
        </form>
</main>
</body>
</html>