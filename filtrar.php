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
            <a href="index.php">Todos los productos</a>
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
            <a href="index.php" id="limpiar"><i class="fa-solid fa-xmark"></i> Limpiar filtros</a>
            </form>
        </div>


    </section>

    <main id="products">
        <div class="max">
<?php

$condiciones = array();
$where = " WHERE ";

if (isset($_POST['marca'])){
    $marca = $_POST['marca'];
    if ($marca!=""){
        $condiciones[] = "marca = '".$marca."'";
    }
}

if (isset($_POST['prenda'])){
    $prenda = $_POST['prenda'];
    if ($prenda!=""){
        $condiciones[] = "prenda = '".$prenda."'";
    }
}

if (isset($_POST['precio'])){
    $precio = $_POST['precio'];
    if ($precio!=""){
        $condiciones[] = "precio > '1000'";
    }
}


if (sizeof($condiciones)>1){
    for ($i=0; $i<sizeof($condiciones); $i++) { 
        $where.=$condiciones[$i];
        if ($i!= sizeof($condiciones)-1){
            $where.=" AND ";
        }
    }    
} else if (sizeof($condiciones) == 1){
    $where.=$condiciones[0];
}

if ($where==" WHERE "){
    $consulta = 'SELECT * FROM ropa';
} else {
    $consulta = 'SELECT * FROM ropa'.$where;
}

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
