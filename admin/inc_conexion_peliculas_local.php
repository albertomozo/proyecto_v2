<?php
$servidor="localhost";
$bduser="root";
$bdclave="";
$bdnombre="peliculas";
$conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
$tmdb_apikey='******************'; // registrarse en themoviedb.org y obtener tu apikey
$tmdb_ruta_poster = 'https://image.tmdb.org/t/p/w154'; // 
?>