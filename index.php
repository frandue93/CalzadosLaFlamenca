<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }



$p="portada";

if(isset($_GET["p"])){
    $p=$_GET["p"];
}

if($p=="portada"){
    $pagina="portada.php";
}

if($p=="blog"){
    $pagina="blog.php";
}

if($p=="contacto"){
    $pagina="contacto.php";
}

if($p=="servicios"){
    $pagina="servicios.php";
}

if($p=="registro"){
    $pagina="registro.php";
}

if($p=="iniciarSesion"){
    $pagina="iniciarSesion.php";
}

if($p=="nuevosArticulos"){
    $pagina="nuevosArticulos.php";
}
if($p=="articuloDetallado"){
    $pagina="articuloDetallado.php";
}
if($p=="carrito"){
    $pagina="carrito.php";
}

if($p=="realizarPedido"){
    $pagina="realizarPedido.php";
}

if(isset($_GET['a'])){
    $accion=$_GET['a'];
    if($accion=="logout"){
       
        
        unset($_SESSION['nick']);
        unset($_SESSION['correo']);
        unset($_SESSION['contraseña']);
       
      session_destroy();
      $usuario ="";
        
    }
}

require_once("cabecera.php");

require($pagina);

require("pie.php");
?>