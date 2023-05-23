


<section class="carrito">

<?php
include_once("clases/talla.php");

if(empty($_SESSION["nick"])){
    $_SESSION["nick"]="";
}

function ver_carrito() {
    $precioFinal=0;
    
    echo '<table>';
    echo '<tr>';
    echo '<th> ID </th>';
    echo '<th> Nombre </th>';
    echo '<th> Imagen </th>';
    echo '<th> Talla </th>';
    echo '<th> Pares </th>';
    echo '<th> Precio ud. </th>';
    echo '<th> Precio suma</th>';
    echo '</tr>';
    foreach($_SESSION["carrito"] as $indice => $producto) {
        $total = 0;
        echo '<tr>';
        echo '<td>' . $producto['id'] . '</td>';
        echo '<td>' . $producto['titulo'] . '</td>';
        echo '<td><img src="' . $producto['imagen'] . '" class="imgCompra" /></td>';
        echo '<td>' . $producto['talla'] . '</td>';
        echo '<td>' . $producto['pares'] . '</td>';
        echo '<td>' . $producto['precio'] . ' €</td>';
        $total = $producto['precio']*$producto['pares'];
        echo '<td>' . $total.' €</td>';
        echo '</tr>';
        $precioFinal=$precioFinal + $total; 
    }
        echo '<tr><td></td><td></td><td></td><td></td><td></td><td></td>';
        echo '<th>'.$precioFinal.' €</th></tr>'; 
        if($_SESSION["nick"]!=""){
            echo '<tr><td>'
        ?><button><a href="index.php?p=realizarPedido&importe=<?php echo $precioFinal ?>">Comprar</a></button><?php
        echo '</td></tr>';
        }
        
    echo '</table>';



}


if(!empty($_SESSION["carrito"])){
echo "<article>";

if($_SESSION["nick"]==""){
    echo "<h2>Inicia sesion para comprar</h2>";
}
$precioFinal = ver_carrito();


?>
<?php if(empty($_SESSION["nick"])){?>

</article>
<?php }}else{?>

    <img src="assets/imagenes/carrito.png" id="carritoCompraVacio" width="50px">
   


    <?php }?>
</section>

<script>

    //si no hay ningun articulo la pagina mostrara un carrito vacio
        $(document).ready(function(){
            $("#carritoCompraVacio").animate({
                right:"38%",
            }, 5000);
            

        });
 

</script> 
