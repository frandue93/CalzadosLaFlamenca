<section class="secPedido">

<?php
include_once("clases/talla.php");
include_once("clases/compras.php");
include_once("clases/detallesPedido.php");
include_once("lib/fecha.php");

function validarTelefono($telefono){
    if (!preg_match('/^[967]\d{8}$/', $telefono))
  return "El teléfono tiene 9 cifras y empieza por 9, 6 o 7";

}

function validarCuenta($cuenta){
    if (!preg_match('/d{12}$/', $cuenta))
  return "El numero de cuenta tiene que tener 12 numeros";

}


if(isset($_POST["comprar"])){
    $importe = $_GET["importe"];

    $nombre=$_POST["nombre"];
    $apellidos=$_POST["apellidos"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $cuenta=$_POST["cuenta"];
    $fechaHoy = today();
    $id_usuario = $_SESSION["id"];

    if(!empty($nombre)){

    $nuevaCompra = new Compras($id_usuario,$nombre,$apellidos,$direccion,$telefono,$fechaHoy,$importe);
    $id_pedido = $nuevaCompra->guardarDatosCompra();
    foreach($_SESSION["carrito"] as $indice => $producto) {
        
        $id_producto = $producto['id'];
        $talla = $producto['talla'];
        $pares = $producto['pares'];

        $detallePed = new detallesPedido($id_pedido,$id_producto,$pares,$talla);
        $detallePed->guardarDetallesPedido();

        $compra = new Talla($talla,$pares,"");
        $unidadesDisponibles = $compra->comprar($id_producto);

    }

    

    
    

    echo "<script>window.open('factura.php?id_pedido=" . $id_pedido . "', '_blank');</script>";
    echo "<script>window.location.replace('index.php?p=portada');</script>";
    
    unset($_SESSION["carrito"]);
    }

}


?>

<form method="POST" class = "formularioPedido" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >
Nombre:<input type="text" name="nombre" class="pedNombre"></input>
Apellidos:<input type="text" name="apellidos" class="pedApellido"></input>
Direccion:<input type="text" name="direccion" class="pedDireccion"></input>
Telefono:<input type="text" name="telefono" class="pedTelefono"></input>
Numero de cuenta:<input type="text" name="cuenta" class="pedCuenta"></input>
<input type="submit" value="Comprar" name="comprar" class="comprarPedido">

</form>
</section>