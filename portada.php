<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<?php 
include("clases/articulos.php");


    if(empty($_SESSION["admin"])){
      $_SESSION["admin"]="";
 
    }

$precio="";
$descripcion="";
$titulo="";
$archivo="";
$admin="";

if(isset($_POST["stockNuevo"])){

}

if(isset($_POST["añadirArticulo"])){
   $id = $_POST["selArticulos"];
   $art = new Articulo("","","","","");
   
   $art->visualizaArticulo($id,1);
}

$articulosDisp = new Articulo("","","","","");
$articulosEnPortada = $articulosDisp->articuloDisponible();



if($_SESSION["admin"]=="admin"){
   $admin="admin";

}else{
   $admin="";
}


if($admin=="admin"){
   $todosArt = new Articulo("","","","","");
   $articulosSelect = $todosArt->articulosSinVisualizar();
   


}

?>


<div class="tituloPrincipal"><h1 >Nuestra selección del mes</h1></div>
<section id="secPortada">


<?php if($admin=="admin"){
   echo "<div class='insertaArtVisibles'>";
   if(!empty($articulosSelect)){
   ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
      <select name="selArticulos">
         <?php
         foreach($articulosSelect as $art){
            echo "<option value=".$art['id'].">".$art['titulo']." (cod- ".$art['id'].")"."</option>";
         }
         ?>
      </select>
      <input type="submit" value="Añadir Articulo" name="añadirArticulo" class="subAñadArt">

    </form>

    </div>


<?php }}?>

<?php

if(!empty($articulosEnPortada)){
foreach($articulosEnPortada as $index){
   ?><form method="POST" action="index.php?p=articuloDetallado&id=<?php echo $indexCal?>" ><?php

$indexCal = $index['id'];
echo "<article> <div class='generalCalzados'>";

   ?>
      <div>
      <img src ="<?php echo $index['imagen']?>"  class="fotosCalzado" onclick="window.location.href='index.php?p=articuloDetallado&id=<?php echo $indexCal?>'" style="cursor: pointer;">
      </div>
      
         <div class="contendioTxt">
      <br><br><p class="tituloCalzado"><?php echo $index['titulo']?></p>
      <p class="descProd"><?php echo $index['descripcion']?></p>
      <p class="precio"><?php echo $index['precio'].' € '?></p>
         </div>
       
   <?php
echo "</div></article>";


  }

}


if(isset($_POST["añadirCarrito"])){
   echo "  id:  ".$_POST["añadirCarrito"];
}
?>

<script>
//creación de slider de imágenes para página de inicio, productos destacados 
var imagenes = []; 
for (var i = 0; i < 2; i++) {
   
   imagenes[i] = 'assets/imagenes/portada' + i + '.png';
 } var indiceImagenes = 0;
  function cambiarImagenes() {
    document.slider.src = imagenes[indiceImagenes];
     if (indiceImagenes < 1) { 
      indiceImagenes++;
    } else { 
      indiceImagenes = 0;
    } } setInterval(cambiarImagenes, 2000); 
     //fin de creación de slider
</script>

<article>
   <h2>Proximamente</h2>
   <img class="promo" name="slider" />


</article>




</section>



