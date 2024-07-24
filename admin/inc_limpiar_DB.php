<?php
include('inc_conexion_peliculas.php');
// limpiar peli_generos
echo $query = 'select distinct peliculaid as p from peli_genero';
$resultado = mysqli_query($conpel,$query);
echo mysqli_num_rows($resultado);
$aborrar = [];
while ($fila = mysqli_fetch_array($resultado))
{
    //print_r ($fila);
    $peliculaId = $fila['p'];
    echo '<p>' . $peliculaId . '</p>';
    $query2 = "select * from peliculas where id = $peliculaId";
    $resultado2 = mysqli_query($conpel,$query2);
    if (mysqli_num_rows($resultado2)== 0) {  array_push($aborrar, $peliculaId); }
}

print_r ($aborrar);
foreach ($aborrar as $key => $valor){
    echo "<p> DELETE FROM peli_genero WHERE peliculaId=$valor </p>";
}
mysqli_close($conpel);

// lo mismo para votaciones

