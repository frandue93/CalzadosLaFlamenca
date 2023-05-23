<section>
<?php
include("clases/articulos.php");

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
    if(empty($_SESSION["admin"])){
      $_SESSION["admin"]="";
    }
    
$precio="";
$descripcion="";
$titulo="";
$archivo="";
$ruta ="assets/imagenes/";


function validarArticulo($titulo,$precio,$archivo){
    if(empty($titulo)||empty($precio)||empty($archivo)){
       return false;
    }else{
       return true;
    }
 }


if(isset($_POST["subir"])){
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    $precio=$_POST["precio"];
    $archivo=$_FILES["archivo"]["name"];
 
    if(validarArticulo($titulo,$precio,$archivo)){
       $tipo= $_FILES['archivo']['type'];
       $tamaño=$_FILES['archivo']['size'];
       $temporal=$_FILES['archivo']['tmp_name'];
       if(!((strpos($tipo,"gif")||strpos($tipo,"jpeg")||strpos($tipo,"jpg")||strpos($tipo,"png")) && ($tamaño < 2000000))){
         $correcto = false;
         echo "La extension es incorrecta o se a sobrepasado el tamaño";
       }else{
         if(is_uploaded_file($_FILES["archivo"]["tmp_name"])){
           move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta.$archivo);
         $imagen=$ruta.$archivo;
 
         
         echo"<p>El archivo se ha cargado con exito. Tamaño de archivo: $tamaño bytes, Nombre de archivo: $archivo";
         }
         
       
       }
       $art = new Articulo($titulo,$descripcion,$precio,$imagen,"");
       $art->guardarArticulo();
    }
 
 
 
 }

?>

 <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
 Selecciona la imagen a subir: <input type="file" name="archivo"><br><br>
 Titulo: <input type="text" name="titulo"><br><br>
 Precio: <input type="text" name="precio"><br><br>
 Descripcion del producto: <input type="text" name="descripcion"><br><br>
 <input type="submit" value="Subir" name="subir">
</form>


</section>