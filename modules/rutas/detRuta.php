<?php
    //Llamada de Conexion
	@include ("../../config/conexion.php");
    $id  = $_GET['id'];
    $query = "SELECT * FROM rutas WHERE id_ruta = ".$id;
	$contenido = mysqli_query($conexion,$query);
    $data_ruta = @mysqli_fetch_assoc($contenido);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Turismo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Plugin jalert CSS-->      
    <link rel="stylesheet" href="../../css/jAlert.css">
    <!-- Plugin Animate.CSS-->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> 
    <!-- style css -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../../css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../../images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
      
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- js -->
    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src="../../js/popper.min.js"></script>	 	 	
    <script src="../../js/bootstrap.min.js"></script> 
    <!--  Plugin jalert JS
    <script src="../../js/jAlert.min.js"></script>
    <script src="../../js/jAlert-functions.min.js"></script> -->
    <script src="../../js/index.js"></script>
</head>
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="../../images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="../../index.html"><img src="../../images/Turismo eterno (4).png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="../../index.html">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../rutas.php">Rutas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../service.html">Agenda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../contact.html">Contactos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../testimonial.html"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../../contact.html"></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    
    <!-- Detalles de la ruta -->
    <div id="contenedor" >
        <div class="contain">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <br>
                        <h2>Detalles de la Ruta</h2> 
                        <br>
                        <?php echo'<a href="editRuta.php?id='.$id.'"><img style="width:30px; height:30px;" src="../../images/editar.png" alt="Editar Ruta"/></a>
                                   <a onclick="delete_ruta('.$id.')"><img style="width:30px; height:30px;" src="../../images/borrar.png" alt="Eliminar Ruta"/></a>';?>
                    </div>
                </div>
            </div>
                <div>
                <fieldset>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label><b>Nombre de Ruta</b></label>
                            <span><?php echo $data_ruta['nombre_ruta'];?></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label><b>Precio</b></label>
                            <span><?php echo $data_ruta['precio'];?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label><b>Punto de Encuentro</b></label>
                            <span><?php echo $data_ruta['p_encuentro'];?></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label><b>Contacto</b></label>
                            <span><?php echo $data_ruta['contacto'];?></span>
                        </div>
                    </div>        
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label><b>Fecha inicial</b></label>
                            <span><?php echo $data_ruta['fecha_ini'];?></span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label><b>Fecha Final</b></label>
                            <span><?php echo $data_ruta['fecha_fin'];?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-2">
                            <label><b>Duración de la Ruta</b></label>
                            <span><?php echo $data_ruta['duracion'];?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label><b>Descripción de la Ruta</b></label>
                            <span><?php echo $data_ruta['descripcion'];?></span>
                        </div>
                    </div>   
                    
                    <div class="form-row">
                        <div class="col-md-12">
                            <label><b>Mapa de la Ruta</b></label>
                            <?php echo'<img style="width:360px; height:220px;" src="../../'.$data_ruta['img_mapa'].'" alt="'.$data_ruta['nombre_ruta'].'"/>'; ?>
                        </div>
                    </div> 
                </fieldset>
                </div>
        </div>
    </div>

     <!-- Crear nueva ruta -->
    </br>
    <footer>
        <div class="footer">
           <div class="container">
              <div class="row">
                 <div class=" col-md-3 col-sm-6">
                    <ul class="social_icon">
                       <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                       <li><a href="https://x.com/X"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                       <li><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>                     </ul>
                    <p class="variat pad_roght2">Nuestros contactos están aquí 
                       para ayudarte con cualquier pregunta que 
                       tengas sobre turismo. Expertos en destinos 
                       emocionantes y experiencias únicas, están listos 
                       para hacer que tu viaje sea inolvidable. 
                    </p>
                 </div>
                 <div class=" col-md-3 col-sm-6">
                    <h3>Rutas</h3>
                    <p  class="variat pad_roght2">Explora el mundo a través de nuestras 
                       emocionantes rutas turísticas. Desde paisajes impresionantes
                        hasta experiencias culturales únicas, nuestras rutas te llevan
                        a lugares inolvidables.
                    </p>
                 </div>
                 <div class="col-md-3 col-sm-6">
                    <h3>INFORMACION</h3>
                    <ul class="link_menu">
                       <li><a href="index.html">Menu</a></li>
                       <li><a href="about.html"> Rutas</a></li>
                       <li><a href="service.html">Agenda</a></li>
                       <li><a href="contact.html">Contactos</a></li>
                    </ul>
                 </div>
                 <div class="col-md-3 col-sm-6">
                    <h3>Reservas</h3>
                    <p  class="variat">Las reservas te permiten asegurar tu lugar en emocionantes destinos turísticos. Desde hoteles hasta tours, garantizan una experiencia sin contratiempos. Planifica con anticipación y disfruta al máximo de cada viaje 
                    </p>
                 </div>
              </div>
           </div>
           <div class="copyright">
              <div class="container">
                 <div class="row">
                    <div class="col-md-10 offset-md-1">
                       <p>© 2024 All Rights Reserved.</p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </footer>
    <!-- end Ruta Llanquihue -->

    <!-- Javascript files-->
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../../js/custom.js"></script>
</body>
</html>
