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
     $menuenlace = 'config_publica'; // para activar (active)  enlace en menu
    include("inc_head.php");
    ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Configuración Web Pública</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <?php 
                    include("inc_conexion_peliculas.php");
                    if ($_POST){
                        echo 'update';
                       // Inicializar una variable para almacenar partes del set
                        $set_parts = [];

                        // Iterar sobre los datos POST para construir la parte SET de la consulta
                        print_r($_POST);
                        foreach ($_POST as $key => $valor) {
                            if ($key != 'enviar'){
                                // Asegurarse de escapar los valores para evitar SQL injection
                                $key = mysqli_real_escape_string($conpel, $key);
                                $valor = mysqli_real_escape_string($conpel, $valor);

                                // Agregar al array de partes del set
                                $set_parts[] = "`$key` = '$valor'";
                            }
                        }

                        // Unir las partes del set en una sola cadena separada por comas
                        $set_clause = implode(", ", $set_parts);

                        // Construir la consulta SQL de actualización
                        echo  $update_query = "UPDATE config SET $set_clause";

                        // Ejecutar la consulta de actualización
                        if (mysqli_query($conpel, $update_query)) {
                            echo "Actualización exitosa";
                        } else {
                            echo "Error en la actualización: " . mysqli_error($conpel);
                        }

                    }
                    // visualizar formulario ?>
                    
                    <hr>

                    <form name="formconfig" method="POST" action = "">
                    <?php
                    echo  $query = "select * from config";
                    $resultado = mysqli_query($conpel,$query);
                    //print_r($resultado);
                    if(mysqli_num_rows($resultado)!=0){ 
                                    
                        while($fila=mysqli_fetch_array($resultado)){  
                           foreach ($fila as $key => $valor){
                            if (!is_int($key)  ){
                            ?>
                              <div class="form-group row">
                                <label for="<?php echo $key;?>" class="col-sm-2 col-form-label"><?php echo $key;?></label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="<?php echo $key;?>" name="<?php echo $key;?>" value="<?php echo $valor;?>" >
                                </div>
                              </div>
                              <?php
                           }
                           }
                        }
                    }    
                    ?> 
                   
                        <div class="col-sm-10">
                                  <button type="submit"  id="enviar" name="enviar" value="enviar">GUARDAR</button>
                            </div>
                    </form>  
                        
                   <hr>
                 

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