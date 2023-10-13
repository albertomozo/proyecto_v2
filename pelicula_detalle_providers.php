<?php
$url2 = "https://api.themoviedb.org/3/movie/$tmdb_id/watch/providers?api_key=$tmdb_apikey&language=es&page=1";
    echo $url2;
    echo '<hr>';
    $resultado2 = file_get_contents($url2);
    $data2 = json_decode($resultado2, true);
    //print_r ($data2);
    $providers = $data2['results'];
    print_r ($providers);
    echo '<hr>';
    print_r ($providers['ES']);
    echo '<hr>';
    echo '<p>Flatrate</p>';
    //echo '<h3>'.$providers['ES']['flatrate']['provider_name'] . '</H3>';
    print_r ($providers['ES']['flatrate']);
    foreach ($providers['ES']['flatrate'] as $key => $value) {
        $finales = $providers['ES']['flatrate'][$key] ;
           echo '<h4>'.$providers['ES']['flatrate'][$key]['provider_name'] .'</h4>';
    }
   
    echo '<hr>';
    echo '<p>Rent</p>';
    print_r ($providers['ES']['rent']);
    foreach ($providers['ES']['rent'] as $key => $value) {
        $finales = $providers['ES']['rent'][$key] ;
           echo '<h4>'.$providers['ES']['rent'][$key]['provider_name'] .'</h4>';
    }
    echo '<hr>';
    echo '<p>Buy</p>';
    print_r ($providers['ES']['buy']);

   
       

    //echo $resultado2;
?>
 