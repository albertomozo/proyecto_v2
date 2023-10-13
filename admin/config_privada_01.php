<?php include("inc_session.php"); ?>
<?php include("inc_config.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php 
     $headTitle .= "";
     $headDescription .= "";
     $headKeywords .=""; 
     $menugrupo  = 'config'; // para mostrar (show) grupo de menu
     $menuenlace = 'config_privada'; // para activar (active)  enlace en menu
    include("inc_head.php");
    ?>
    <script>
        function config_privada($clave,$valor)
        {
            
            const url = "config_privada_grabar.php?clave=" + $clave + "&valor=" + $valor

            fetch(url)
                .then(response => response.text())
                .then(repos => { 
                    const respuesta = repos;
                    console.log(repos);
                })
                .catch(err => console.log(err))


        }
        function config_privada2($clave,$valor)
        {
            
            const url = "config_privada_grabar.php?clave=" + $clave + "&valor=" + $valor

            fetch(url)
                .then(response => response.text())
                .then(repos => { 
                    const respuesta = repos;
                    console.log(repos);
                })
                .catch(err => console.log(err))


        }
    </script>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include("inc_sidebar.php");?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("inc_topbar.php");?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Configuración Web Privada</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <?php 
                    include("inc_conexion_peliculas.php");
                    if ($_POST){
                        $meta = $_POST['meta'];	
                        $valor = $_POST['valor'];	
                        $query = "insert into config_privada (meta,valor) values ('$meta','$valor')";
                        $resultado = mysqli_query($conpel, $query);
                    }


                    echo  $query = "select * from config_privada";
                     $resultado = mysqli_query($conpel,$query);
                    //print_r($resultado);
                    if(mysqli_num_rows($resultado)!=0){ 
                                    
                        while($fila=mysqli_fetch_array($resultado)){  
                            $key = $fila['meta'];
                            $valor = $fila['valor'];
                            ?>
                              <div class="form-group row">
                                <label for="<?php echo $key;?>" class="col-sm-2 col-form-label"><?php echo $key;?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="<?php echo $key;?>" name="<?php echo $key;?>" id="<?php echo $key;?>"   value="<?php echo $valor;?>" onblur="config_privada('<?php echo $key;?>',document.getElementById('<?php echo $key;?>').value)" width="80%">
                                   
                                 
                                    <button  class="btn-primary" value="guardar" name="<?php echo $key;?>" width="%" onclick="config_privada_2('<?php echo $key;?>',document.getElementById('<?php echo $key;?>').value)">GUARDAR</button>
                                    
                                    
                                </div>
                              </div>
                              <?php
                        }
                    }    
                    ?>  
                    <hr><h5> Introduce un nuevo meta </h5> 
                      <form method="post">
                        <input type="text" name="meta" placeholder="introduce un meta si espacio ni cosas raras">
                        <input type="text" name="valor" placeholder="introduce el valor ">
                        <input type="submit" name="guardar" value="guardar">
                   </form> 

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                  
                    <!-- Content Row -->
                 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("inc_footer.php");?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include("inc_modal_logout.php"); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>