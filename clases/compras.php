<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
    include_once("./lib/conexion.php");


    class Compras{
        private $id_usuario;
        private $nombre;
        private $apellidos;
        private $direccion;
        private $telefono;
        private $fecha;
        private $importe;

        public function __construct($id_usuario,$nombre,$apellidos,$direccion,$telefono,$fecha,$importe){
            $this->id_usuario=$id_usuario;
            $this->nombre=$nombre;
            $this->apellidos=$apellidos;
            $this->direccion=$direccion;
            $this->telefono=$telefono;
            $this->fecha=$fecha;
            $this->importe=$importe;
        }

        public function guardarDatosCompra(){

            $sql = "insert into pedidos values(null,'$this->id_usuario','$this->nombre','$this->apellidos','$this->direccion','$this->telefono','$this->fecha','$this->importe')";

            $conexion=Conexion::conectarBD();
            if($res = $conexion->query($sql)){
                $ultimo_id = mysqli_insert_id($conexion);
            }
            
        Conexion::desconectarBD($conexion);
        return $ultimo_id;
        }

        public function datosPedido($id_pedido){
            $sql="SELECT *
            FROM pedidos
            JOIN detallespedido ON pedidos.id_pedido = detallespedido.id_pedido
            WHERE pedidos.id_pedido = '$id_pedido'
            LIMIT 1";
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