<section>
<article id="artDetallado">
<?php
include_once("clases/articulos.php");
include_once("clases/talla.php");

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$msgExistencias="";

if(empty($_SESSION["admin"])){
    $_SESSION["admin"]="";

  }


if(isset($_GET["id"])){
    $id = $_GET["id"];
    $art = new Articulo("","","","","");
    $articulo = $art->buscarArticulo($id);

}

if(isset($_POST["borrar"])){
    $id = $_GET["id"];
    $art = new Articulo("","","","","");
    
    $art->visualizaArticulo($id,0);
    header('Location:index.php?p=portada');
}

if(isset($_POST["añadirStockTalla"])){
    $talla = $_POST["talla"];
    $stock = $_POST["stock"];
    $tall =new Talla($talla,$stock,"");
    $talla = $tall->buscarTallaeId($id);
    if($talla == true){
    $talla = $tall->añadeStock($id);
    }else{
       $talla = $tall->crearTalla($id);
    }
}


if(isset($_POST["comprarArticulo"])){
    if(isset($_POST["tallasDisponibles"]) && $_POST["pares"]){
    $talla = $_POST["tallasDisponibles"];
    $pares = $_POST["pares"];

  
    $compra = new Talla($talla,$pares,"");
    $unidadesDisponibles = $compra->numeroStock($id);
    $diferencia = $unidadesDisponibles["stock"] - $pares;
        if($diferencia<0){
        $msgExistencias = "No es posible añadir el articulo , las unidades disponibles son : ".$unidadesDisponibles["stock"];
        }else{
            $producto = array("id" => $id,
                              "talla" => $talla,
                              "titulo"=> $articulo["titulo"],
                              "imagen"=> $articulo["imagen"],
                              "pares" => $pares,
                              "precio"=> $articulo["precio"]
                            );
            array_push($_SESSION['carrito'],$producto);

            $msgExistencias ="Producto añadido al carrito";

        }
    }else{
        $msgExistencias ="No se ha añadido ningun producto al carrito";

    }
}



?>

<h2 class="tituloDetallado"><?php echo $articulo["titulo"] ?></h2>
<div class="imgDetIzq">
<img src=<?php echo $articulo["imagen"]?> alt="<?php echo $articulo["titulo"]?>" class="imgDetalle"/>
</div>
<div class="textDetDer">
<p><?php echo "Descripcion : ".$articulo["descripcion"]?></p>
<p>Precio: <?php echo $articulo["precio"]?> €</p>

<?php if($_SESSION["admin"]=="admin"){ ?>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
<p>Talla: <select name="talla"></p>
<?php for($i=20;$i<47;$i+=2){
    echo "<option value=".$i.">".$i."</option>";
}?>
</select>
<p>Stock a añadir: <input type="text" name="stock" size="10"></input><br>
<input type="submit" value="Añadir" name="añadirStockTalla"></p>


      
      <form method="post" action="">
     <input type="submit" name="borrar" id="borrar" value="Quitar articulo">
     </form>


    
<?php }?>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
<p>Tallas disponibles: <select name="tallasDisponibles"></p>
    <?php 
        for($i=20;$i<47;$i+=2){
            
            $tallDisp = new Talla($i,"","");
            $tallDisponible = $tallDisp->buscarTallaeId($id);
            if($tallDisponible){
                echo "<option value=".$i.">".$i."</option>";

            }

        }
        echo "</select>";

     ?>
<p>Pares: <input type="text" name="pares" size="10"></input></p>

<input type="submit" value="Añadir al carrito" class="añadirAlCarrito" name="comprarArticulo" id="boton"  onclick="cambiarColor()">
<br><?php echo $msgExistencias ?>
</form>

</div>
</article>
</section>

<script>
//cambiamos el color del boton cuando pulsamos sobre el
function cambiarColor() {
    document.getElementById("boton").style.backgroundColor = "yellow";
  }
  
  </script>