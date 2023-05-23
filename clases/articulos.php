<?php 

include_once("./lib/conexion.php");

class Articulo{
    private $titulo;
    private $descripcion;
    private $precio;
    private $imagen;
    private $visualizada;
    

    public function __construct($titulo,$descripcion,$precio,$imagen,$visualizada){
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
        $this->imagen=$imagen;
        $this->visualizada=$visualizada;
    }

    public function guardarArticulo(){
        $sql = "insert into articulos values(null,'$this->titulo','$this->precio','$this->descripcion','$this->imagen','')";
        $conexion=Conexion::conectarBD();
        if($conexion->query($sql)){
            $msg="Guardado";
        }
    }

    public function articulosSinVisualizar(){
        $sql="select * from articulos where visualizada=0";
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        $alguno=false;
        while($linea = $res->fetch_assoc()){
            $alguno = true;
            $articulosTot[]=$linea;
        }
        $res->free();
        Conexion::desconectarBD($conexion);
        if($alguno){
            return $articulosTot;
        }else{
            return false;
        }
    }

    public function buscarArticulo($id){
        $sql="select * from articulos where id='$id'";
        
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

    public function articuloDisponible(){
        $sql="select * from articulos where visualizada=1";
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        $alguno=false;
        while($linea = $res->fetch_assoc()){
            $alguno = true;
            $articulosTot[]=$linea;
        }
        $res->free();
        Conexion::desconectarBD($conexion);
        if($alguno){
            return $articulosTot;
        }else{
            return false;
        }
    }

    public function visualizaArticulo($id,$visualizada){
        $sql="UPDATE articulos
        SET visualizada = $visualizada
        WHERE id = $id";
       
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        if($res->num_rows > 0){
            $linea=$res->fetch_assoc();
        }else{
            $linea=false;
        }
        Conexion::desconectarBD($conexion);

        return $linea;
    }
}


?>