<?php /* $servidor="localhost";
$bduser="root";
$bdclave="";
$bdnombre="peliculas";
$conpel=mysqli_connect($servidor,$bduser,$bdclave,$bdnombre);
if ($conpel){
    mysqli_set_charset($conpel,'utf8');
}
 $query = "select * from config_privada";
    $resultado = mysqli_query($conpel,$query);
//print_r($resultado);
if(mysqli_num_rows($resultado)!=0){ 
                
    while($fila=mysqli_fetch_array($resultado)){  
        $key = trim($fila['meta']);
        $valor = $fila['valor'];
        $$key = $valor;
        echo "$key = $valor"
        ?>
            
            <?php
    }
}  
mysqli_close($conpel); */
                        ?>  
<div class="show" id="BienvenidaModal" tabindex="100" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $CFGP['mensaje_bienvenida']; ?></h5>
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" onClick="document.getElementById('BienvenidaModal').style.display='none'">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
            </div>
        </div>
</div>
