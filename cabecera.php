<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

   <meta http-equiv ="Content-Type" content ="text/html; charset=UTF-8" />
   <link rel="stylesheet" href="assets/css/estilo.css?1.0">
   <script src="https://kit.fontawesome.com/12f1191bee.js" crossorigin="anonymous"></script>
   
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
   
  <script> 

//funcion que carga el logo
window.onload = function() {
           document.getElementById('logo').style.width= '95px';
document.getElementById('logo').style.height = '95px';
      
}
</script>
   <title >Calzados la Flamenca </title>
</head>


<body>
<?php if(empty($_SESSION["nick"])){
      $usuario ="";
}else{
   $usuario = $_SESSION["nick"];
}

if(empty($_SESSION["nick"])){
  $usuario ="";
}else{
$usuario = $_SESSION["nick"];
}

?>
    

<header><img class="logo" id="logo" src="assets/imagenes/logo.PNG"><br> </header>
<menu id="menu">
   
   <input type="checkbox" id="hamburguesa">
   <label for="hamburguesa" class="fa fa-bars" id="icon"></label>
   <ul class="desplegable" id="desplegable">
     
       <li><a href="index.php?p=portada" >Inicio</a></li>
       <div></div>
       <li><a  href="index.php?p=blog">Blog</a></li>
       <div></div>
       <li><a href="index.php?p=servicios">Servicios</a></li>
       <div></div>
       <li><a href="index.php?p=contacto">Contacto</a></li>   
       <div></div>
       <li><a href="index.php?p=carrito"><i class="fas fa-shopping-cart"></i></a></li>
       <div></div>
          
       <div></div>
     <?php if($usuario==""){?>
       <li><a href="index.php?p=iniciarSesion">Iniciar Sesion</a></li>
       <div></div>

    <?php }else{?>
      <li><a href="index.php?p=nuevosArticulos">Añadir articulo</a></li>
      <div></div>

       <li><a href="index.php?a=logout">LOGOUT</a></li>
       <div></div>
       <li>Bienvenda/o : <?php echo $usuario ?></li>
       <div></div>

    <?php }?>       
    <div></div>


   </ul>
     
   
</menu>

<p id="fecha"></p>
<script src="funciones.js"></script>

<script>

  //aqui llamo a la funcion de la fecha desde otra pagina
  document.getElementById("fecha").innerHTML = fecha();


//al desplazarnos por el menu, si estamos sobre algun li , este se pondra en rojo.
  let test = document.getElementById("desplegable");

test.addEventListener("mouseover", function (event) {
  event.target.style.color = "red";
}, false);

test.addEventListener("mouseout", function (event) {
  event.target.style.color = "black";
}, false);


  </script>