<?php header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=mi_hoja_de_calculo.xls");

?>
<?php include("inc_config.php");

                        include("./inc_conexion_peliculas.php");
                        $query = " select elemento_votado, AVG(valoracion) media, count(valoracion) votantes from votaciones group by elemento_votado order by AVG(valoracion) DESC";
                        $resultado = mysqli_query($conpel,$query);
                        $legend = [];
                        $data = [];
                        $votantes = [];
                        if(mysqli_num_rows($resultado)!=0){   

                                echo "<table>";
                                while($fila=mysqli_fetch_array($resultado)){     
                                         $query2="select titulo from peliculas where id = " .  $fila["elemento_votado"];
                                        $resultado2 = mysqli_query($conpel,$query2);
                                        $titulo ='No encontrado';
                                        if(mysqli_num_rows($resultado2)!=0){ 
                                            $fila2 = mysqli_fetch_assoc($resultado2);
                                            $titulo = $fila2['titulo'];
                                        }  
                                        echo '<tr>';
                                        echo '<td>'.$titulo.'</td>';
                                        echo '<td>'.$fila["media"].'</td>';
                                        echo '<td>'.$fila["votantes"].'</td>';
                                        echo '</tr>';
                                        array_push($legend,$titulo);
                                        array_push($data,$fila["media"]);
                                        array_push($votantes,$fila["votantes"]);
                            } // FIN WHILE 
                            echo '</table>';
                        
                                
                        }else{     
                                    
                        }  
                        