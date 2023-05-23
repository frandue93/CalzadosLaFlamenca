<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
    include_once("./lib/conexion.php");

    class Talla{
        private $id;
        private $num_talla;
        private $stock;

        public function __construct($num_talla,$stock,$id){
            $this->id=$id;
            $this->num_talla=$num_talla;
            $this->stock=$stock;
        }

        public function crearTalla($id){
            $sql = "insert into talla values('$this->num_talla','$this->stock','$id')";
            $conexion=Conexion::conectarBD();
            if($conexion->query($sql)){
                return true;
            }
            return false;
        }

        public function buscarTallaeId($id){
            $sql ="SELECT * FROM talla WHERE id_articulo = '$id' AND num_talla = '$this->num_talla'";

            $conexion=Conexion::conectarBD();
            $res=$conexion->query($sql);
            if($res->num_rows > 0){
                $linea=true;
            }else{
                $linea=false;
            }
            $res->free();
            Conexion::desconectarBD($conexion);
    
            return $linea;
        }

        public function añadeStock($id){
            $sql= "update talla set stock = stock + '$this->stock' where id_articulo = '$id' and num_talla = '$this->num_talla'";
        $conexion=Conexion::conectarBD();
        if($conexion->query($sql)){
            $msg="Guardado";
        }
        }

        public function comprar($id){
            $sql= "UPDATE talla SET stock = CASE WHEN stock - '$this->stock' < 0 THEN stock ELSE stock - '$this->stock' END WHERE id_articulo = '$id' AND num_talla = '$this->num_talla'";
        $conexion=Conexion::conectarBD();
        if($conexion->query($sql)){
            return true;
        }else{
            return false;
        }
        }

        public function numeroStock($id){
            $sql= "SELECT stock FROM talla WHERE id_articulo = '$id' AND num_talla = '$this->num_talla'";
            $conexion=Conexion::conectarBD();
            $res=$conexion->query($sql);
            if($res->num_rows > 0){
                $linea=$res->fetch_assoc();
            }else{
                $linea=false;
            }
            $res->free();
            Conexion::desconectarBD($conexion);
    
            return $linea;
        }


    }



?>