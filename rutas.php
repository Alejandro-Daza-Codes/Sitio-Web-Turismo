<?php
    session_start();
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
      <title>Turismo Eterno</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout in_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
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
                              <a href="index.html"><img src="images/Turismo eterno (4).png" alt="#" /></a>
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
                              <li class="nav-item">
                                 <a class="nav-link" href="index.html">Menu</a>
                              </li>
                              <li class="nav-item active">
                                 <a class="nav-link" href="rutas.php">Rutas</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contactos</a>
                              </li>
                              <?php if (isset($_SESSION['user_id'])){?>
                                    <li class="nav-item">
                                       <a class="nav-link" href="logout.php">Salir</a>
                                    </li>
                              <?php }else{?>
                                    <li class="nav-item">
                                       <a class="nav-link" href="service.html">Agenda</a>
                                    </li>
                              <?php }?>
                              <li class="nav-item">
                                 <a class="nav-link" href="testimonial.html"></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html"></a>
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
      <!--  service -->
      <section class="banner_main">
         <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <div class="row">
                           <div class="col-md-7 offset-md-5">
                              <div class="text-bg">
                                 <h1>CREA TUS RUTAS </h1>
                                 <a class="read_more fas fa-pencil-alt" href="modules/rutas/newRuta.php">Entra Aqui</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div id="gallery"  class="gallery">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>RUTAS</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 col-sm-6" style="height:auto;">
                  <div class="gallery_text">
                     <div class="galleryh3">
                        <h3> Elija la ruta que desea.
                     </div>
                  </div>
               </div>
               
               <?php
                  //Llamada de Conexion
	               @include ("config/conexion.php");
                  $query = "SELECT * FROM rutas";
			         $contenido = mysqli_query($conexion,$query);
                  $data_rutas = @mysqli_fetch_assoc($contenido);

                  do{
                     if($data_rutas['img_mapa']){
                        echo'
                           <div class="col-md-4 col-sm-6">
                              <div class="gallery_img">
                                 <figure><a href="modules/rutas/detRuta.php?id='.$data_rutas['id_ruta'].'"><img style="width:360px; height:220px;" src="'.$data_rutas['img_mapa'].'" alt="'.$data_rutas['nombre_ruta'].'"/></a></figure>
                              </div>
                           </div>
                        ';
                     }
                  }while($data_rutas = @mysqli_fetch_assoc($contenido))
               ?>

               <div class="col-md-4 col-sm-6">
                  <div class="gallery_img">
                     <figure><img style="width:360px; height:220px;" src="images/123345.jpeg" alt=""/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--  footer -->
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
                        <li><a href="rutas.html"> Rutas</a></li>
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
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>