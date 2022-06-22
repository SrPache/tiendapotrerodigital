<?php
    print '<div class="form-group">';
    print '<label for="marca">Marca:</label>';
    print '<select name="marca" id="marca">';
    print '<option value="" selected disabled></option>';
    print '<optgroup label="Seleccione una marca:">';
            
    $consulta = 'SELECT * FROM ropa';
    $datos = mysqli_query($conexion, $consulta);

    $marcas = [];
    
    while ($fila = mysqli_fetch_array($datos)){
        if (!in_array($fila['marca'], $marcas)){
            $marcas[] = $fila['marca'];
        }
    }

    foreach ($marcas as $marca) {
        print '<option value="'.$marca.'">'.ucfirst($marca).'</option>';
    }

    print '</optgroup>';
    print '</select>';
    print '</div>';
    
?>