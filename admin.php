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
            <a href="index.php">
                <h1>Tienda Potrero</h1>
            </a>
            <nav id="nav">
                <a href="login.php" class="font-awesome"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                <!-- <a href="" class="font-awesome"><i class="fa-solid fa-cart-shopping"></i></a> -->
            </nav>
        </div>
    </header>
    <section id="filters">

        <form class="max" id="first">
            <a href="">Todos los productos</a>
            <button type="submit" id="filter"><i class="fa-solid fa-filter"></i> Filtrar</button>
        </form>

        <div class="max oculto" id="second">

            <form action="filtrar.php" method="POST">
            
            <?php include 'marcas.php';?>          
            <?php include 'prendas.php';?>
            <div class="form-group">
                <input type="checkbox" name="precio" id="precio" class="check">
                <label for="precio">Más de $1000</label>
            </div>
            <button type="submit" id="filtrar">Filtrar</button>

            </form>
        </div>


    </section>

    <main id="products">
        <div class="max">
        
        <form class="product" method="POST" action="agregar.php" enctype="multipart/form-data">
            <label for="imagen" id="label-imagen"><span style="font-weight: 700; font-size: .9rem; color:red; text-decoration: underline">(Campo obligatorio)</span> Add photo <i class="fa-solid fa-cloud-arrow-up"></i></label>
            <input class="form-editable" type="file" name="imagen" id="imagen" hidden>
            <input class="form-editable" type="text" name="prenda" id="prenda" placeholder="Tipo de prenda" required>
            <input class="form-editable" type="text" name="marca" id="marca" placeholder="Marca" required>
            <input class="form-editable" type="text" name="talle" id="talle" placeholder="Talle" required>
            <input class="form-editable" type="text" name="color" id="color" placeholder="Color" required>
            <input class="form-editable" type="number" name="precio" id="precio" placeholder="Precio" required>
            <input class="form-editable" type="text" name="link" id="link" placeholder="link">

            <button type="submit" id="agregar">Agregar</button>
        </form>

        <?php
            $consulta = 'SELECT * FROM ropa';

            $datos = mysqli_query($conexion, $consulta);
            
            while ($fila = mysqli_fetch_array($datos)){
                print '<div class="product">';
                print '<div class="edit-mode">';
                print '<a class="edit" href="editar.php?id='.$fila['id'].'"><i class="fa-solid fa-pen-to-square"></i></a>';
                print '<a class="borrar" href="borrar.php?id='.$fila['id'].'"><i class="fa-solid fa-circle-minus"></i></a>';
                print '</div>';
                print '<img src="data:image/png; base64,'. base64_encode($fila['imagen']).'" alt="" width="100%">';
                print '<h3>'. ucfirst($fila['prenda']).' '.ucfirst($fila['marca']).'</h3>';
                print '<p>Talle '.strtoupper($fila['talle']).'</p>';
                print '<p>Color '.$fila['color'].'</p>';
                print '<p class="precio">$'.$fila['precio'].'</p>';
                print '</div>';
            }
        ?>

    </main>

    <script>
        let boton = document.querySelector('#filter');
        let filtrar = document.querySelector('#second');

        boton.addEventListener("click", (event) =>{
            event.preventDefault();
            if (filtrar.classList.contains("oculto")){
                filtrar.classList.remove("oculto");
            } else {
                filtrar.classList.add("oculto");
            }
        });
    </script>
</body>
</html>

