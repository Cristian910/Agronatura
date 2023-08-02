<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nosotros</title>
	<script defer src="js/menu.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="img/logoblanco.png">
    <!--cdn de modernizr-->
        <link rel="stylesheet" type="text/css" href="static/css/AutumnLeaf.min.css">
    <script src="static/js/greensock.js"></script>
    <script src="static/js/AutumnLeaf.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/modernizr@3.11.2/modernizr.min.js"></script>
    <link rel="stylesheet" href="css/nosotros.css">
<script>
  //Modernizr
  
  //if (!Modernizr.boxshadow) {
    //document.documentElement.classList.add('no-boxshadow');
  //}
  
  //if (!Modernizr.cssgradients) {
    //document.documentElement.classList.add('no-cssgradients');
 // }
  
  //if (!Modernizr.flexbox) {
    //document.documentElement.classList.add('no-flexbox');
  //}
</script>
<script>
    $(document).ready(function() {
      setTimeout(function() {
        $('.mensaje').fadeOut();
      }, 1500);
    });
    
    $(document).ready(function() {
      $('.volver-container').fadeOut();
    $(window).scroll(function() {
      var headerHeight = $('.titulo').outerHeight();
      var scrollTop = $(window).scrollTop();
      
      if (scrollTop > headerHeight) {
        $('.volver-container').fadeIn();
      } else {
        $('.volver-container').fadeOut();
      }
    });
  });
  </script>
  </head>
  <body>
	
<header id="inicio">
        <!--navegador-->
    <nav class="nave" >
        <!--logo de la pagina-->
		<div class="logo">
			<img class="animate__animated animate__backInDown" src="img/agronatura.png" alt="" width="200" height="90">
		</div>
        <button class="open-menu">
        <img src="img/menu.png" alt="" width="45">
        </button>
	<div class="menu animate__animated animate__slideInDown">
        <button class="close-menu">
        <img src="img/x.png" alt="" width="50">
        </button>
		 <a href="index.html">Inicio</a>
     <a href="unidad.html">Unidades Productivas</a> 
		 <a href="nosotros.html">Nosotros</a>
	</div>
</nav>  
          <!--titulo header-->
<div class="tit animate__animated animate__slideInDown">
  <h1 class="titulo"> Nosotros </h1>
</div>
</header>
<div class="volver-container">
  <a class="btn-volver" href="#inicio"><img src="img/icon.png" alt=""></a>
</div>
<main class="unid">
<div class="unid-content container">
            <!--titulo del mapa-->
  <h2 class="titulos"> Donde Encontrarnos </h2>
      <p class="txt-p" style="font-size: 25px;">
        Esta es la ubicacion del sena CBA
      </p>
                <!--mapa del CBA-->
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15905.70642971118!2d-74.215626!3d4.6957037!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9d58cf6e291b%3A0x8946ec678fcf04b4!2sSENA%20Mosquera%20-%20Centro%20de%20Biotecnolog%C3%ADa%20Agropecuaria%20(CBA)!5e0!3m2!1ses!2sco!4v1678975402488!5m2!1ses!2sco" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe><br><br>
          <a href="https://goo.gl/maps/9uTamob99ipzWhUNA" class="button" target="_blank">ir al mapa completo</a> 
</div>
</main>
          <!--galeria del CBA-->
<section class="gallery" id="galeria">
  <div class="contenedor">
      <h2 class="subtitulo">Galeria</h2>
          <!--imagenes de la galeria-->
          <div class="gallery-wrap">
    <div class="item item-1"></div>
    <div class="item item-2"></div>
    <div class="item item-3"></div>
    <div class="item item-4"></div>
    <div class="item item-5"></div>
  </div>
 </div>
</section>
            <!--formulario-->
          <section class="form">
  <form class="my-form" method="post">
    <div class="container">
      <h1>Contactanos</h1>
      <ul>
        <li>
          <div class="grid grid-2">
            <input type="text" name="nombre" placeholder="Nombre">  
            <input type="text" name="apellido" placeholder="apellido">
          </div>
        </li>
        <li>
          <div class="grid grid-2">
            <input type="email" name="correo" placeholder="Correo electronico">  
            <input type="tel" name="telefono" placeholder="telefono">
          </div>
        </li>    
        <li>
          <textarea placeholder="Escribe tu solicitud"></textarea>
        </li>   
          <div class="grid grid-3">
            <button class="btn-grid" name="enviar" type="submit">
              <span class="back">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
              </span>
              <span class="front" >Enviar</span>
            </button>
          </div>
      </ul>
    </div>
  </form>
  </section>
  <?php
if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["correo"]) && isset($_POST["telefono"])) {
  if(!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["correo"]) && !empty($_POST["telefono"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];
    if (isset($_POST["enviar"])) {
      $mensaje = "<div class='mensaje'><h2 class='envio'>".$nombre." ".$apellido." muy pronto nos comunicaremos con usted</h2></div>";
      echo $mensaje;
    }
  } else {
    echo "<div class='mensaje'><h2 class='error'>Por favor, llene todos los campos</h2></div>";
  }
}
?>
          <!--pie de pagina-->
<footer id="footer">
  <div class="contenedor footer-content">
          <div class="contact-us">
            <img src="img/agronatura.png" alt="" width="200" height="100">
            <h2 class="brand">AgroNatura </h2>
              <p>Sembrando futuro, cosechando éxito.</p>
          </div>
          <!--links-->
          <div class="social-media">
              <a href="https://www.facebook.com/SENA/" class="social-media-icon" target="_blank">
                  <i class='bx bxl-facebook'></i>
              </a>
              <a href="https://twitter.com/SENAComunica?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="social-media-icon" target="_blank">
                  <i class='bx bxl-twitter' ></i>
              </a>
              <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" class="social-media-icon" target="_blank">
                <img src="img/logoblanco.png" alt="" style="width: 80%;margin-top: 10px;">
              </a>
          </div>
  </div>
  <div class="line"></div>
</footer>
  <script type="text/javascript">
    $.AutumnLeafStart({
      initialleaves: 4,
          maxyposition: 300,
          infinite: false,
          fallingsequence: 2750,
          multiplyclick: false,
          multiplynumber: 0,
          leavesfolder: "static/AutumnLeaves/",
          howmanyimgsare: 8,
    });
    $.klanimate();
    </script>
  </body>
</html>
