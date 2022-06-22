<?php
    print '<div class="form-group">';
    print '<label for="prenda">Prenda:</label>';
    print '<select name="prenda" id="prenda">';
    print '<option value="" selected disabled></option>';
    print '<optgroup label="Seleccione tipo de prenda:">';
            
    $consulta = 'SELECT * FROM ropa';
    $datos = mysqli_query($conexion, $consulta);

    $prendas = [];
    
    while ($fila = mysqli_fetch_array($datos)){
        if (!in_array($fila['prenda'], $prendas)){
            $prendas[] = $fila['prenda'];
        }
    }

    foreach ($prendas as $prenda) {
        print '<option value="'.$prenda.'">'.ucfirst($prenda).'</option>';
    }

    print '</optgroup>';
    print '</select>';
    print '</div>';
    
?>