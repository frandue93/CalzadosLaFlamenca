<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
    include_once("./lib/conexion.php");


    class detallesPedido{
        private $id_pedido;
        private $id_producto;
        private $pares;
        private $num_talla;

       

        public function __construct($id_pedido,$id_producto,$pares,$num_talla){
            $this->id_pedido=$id_pedido;
            $this->id_producto=$id_producto;
            $this->pares=$pares;
            $this->num_talla=$num_talla;

        }

        public function guardarDetallesPedido(){

            $sql = "insert into detallespedido values(null,'$this->id_pedido','$this->id_producto','$this->pares','$this->num_talla')";

            $conexion=Conexion::conectarBD();
            if($conexion->query($sql)){
                Conexion::desconectarBD($conexion);
                return true;
            }else{
                Conexion::desconectarBD($conexion);
                return false;
            }
            
        
        
        }

        public function datosDetallePedido(){
            
            $sql="SELECT *
            FROM detallespedido dp
            JOIN articulos a ON dp.id_producto = a.id
            WHERE dp.id_pedido ='$this->id_pedido'";

            $conexion=Conexion::conectarBD();
            $res=$conexion->query($sql);
            $alguno=false;
            while($linea = $res->fetch_assoc()){
                $alguno = true;
                $totPedido[]=$linea;
            }
            $res->free();
            Conexion::desconectarBD($conexion);
            if($alguno){
                return $totPedido;
            }else{
                return false;
            }
        }


        

        
        


    }
    ?>