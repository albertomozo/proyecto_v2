<?php include("inc_conexion_peliculas.php");
echo $query = "UPDATE config_privada SET valor  = '". $_REQUEST['valor'] ."' WHERE meta = '" .  $_REQUEST['clave']  ."'";
if ($resultado = mysqli_query($conpel, $query)){echo 'Ok' ;} else {echo 'Error';}
mysqli_close($conpel);
?>