<?php require_once('./lib/fpdf/fpdf.php');
         require_once("clases/compras.php");
         require_once("clases/detallesPedido.php");



class PDF extends FPDF{

function header(){
    global $id_pedido;
    $compra = new Compras("","","","","","","");
    $factura = $compra->datosPedido($id_pedido);
   $this->SetFont('Arial','B',14);
    $this->Cell(50,10,"",0,0);
    $this->Cell(80,10,UTF8_DECODE("Factura Nº : ".$id_pedido),1,0,'C');
    $this->Ln();
    $this->Cell(50,10,"",0,0);
    $this->Ln();
  
    $this->Ln();

    foreach($factura as $indice=>$val){
        $precioFinal = $val["importe"];
        $this->Cell(40,10,UTF8_DECODE("Fecha : ".$val["fecha"]),0,0);
        $this->Ln();
        $this->Cell(40,10,UTF8_DECODE("Nombre completo: ".$val["nombre"]." ".$val["apellidos"]),0,0); 
        $this->Ln();
        $this->Cell(40,10,UTF8_DECODE("Direccion : ".$val["direccion"]),0,0);
        $this->Ln();

    }
    
}



function CuerpoTabla($id_pedido){
    $linea = 90;
    $detalles = new detallesPedido($id_pedido,"","","");
    $facturaDetalles = $detalles->datosDetallePedido();
    $this->Ln();
    $this->Cell(40,10,UTF8_DECODE("Articulo"),0,0,'C'); 
        $this->Cell(40,10,UTF8_DECODE("Talla"),0,0,'C');
        $this->Cell(40,10,UTF8_DECODE("Unidades"),0,0,'C');
        $this->Cell(40,10,UTF8_DECODE("Precio unidad"),0,0,'C');

        $this->Line(10,90,180,90);
        $this->Ln();

    foreach($facturaDetalles as $indice=>$val){
        $linea=$linea+10;
        $this->Cell(40,10,UTF8_DECODE($val["id_producto"]."-".$val["titulo"]),0,0,'C'); 
        $this->Cell(40,10,UTF8_DECODE($val["num_talla"]),0,0,'C');
        $this->Cell(40,10,UTF8_DECODE($val["pares"]),0,0,'C');
        $this->Cell(40,10,UTF8_DECODE($val["precio"]." eur."),0,0,'C');

       

        $this->Ln();
    }
    
    $compra = new Compras("","","","","","","");
    $factura = $compra->datosPedido($id_pedido);
    foreach($factura as $indice=>$val){
        
        $this->Line(10,$linea,180,$linea);
        $this->Cell(148,10,UTF8_DECODE("Importe total : ".$val["importe"]." eur."),0,0,'R');
       

    }

    


}


function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','',14);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
}
}