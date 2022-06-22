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
            <a href="#">
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

        <div class="max" id="second">

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
        <?php
            $consulta = 'SELECT * FROM ropa';

            $datos = mysqli_query($conexion, $consulta);
            
            while ($fila = mysqli_fetch_array($datos)){
                print '<div class="product">';
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