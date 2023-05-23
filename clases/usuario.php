<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
    include_once("./lib/conexion.php");

class Usuario{
    private $nick;
    private $correo;
    private $contraseña;
    private $fechaNacimiento;
    private $admin;
    public function __construct($nick,$correo,$contraseña,$fechaNacimiento,$admin){
        $this->nick=$nick;
        $this->correo=$correo;
        $this->contraseña=$contraseña;
        $this->fechaNacimiento=$fechaNacimiento;
        $this->admin=$admin;
    }

    public function guardaUsuario(){
        $sql= "insert into usuarios values(null,'$this->correo','$this->nick','$this->fechaNacimiento','$this->contraseña','')";
        $conexion=Conexion::conectarBD();
        if($conexion->query($sql)){
            $msg="Guardado";
        }
    }

    public function guardaAdmin(){
        $sql= "insert into usuarios values(null,'$this->correo','$this->nick','$this->fechaNacimiento','$this->contraseña','si')";
        $conexion=Conexion::conectarBD();
        if($conexion->query($sql)){
            $msg="Guardado";
        }
    }

    public function loginUsuario(){
        $sql="select * from usuarios where nick='$this->nick' and contraseña='$this->contraseña'";
        $linea=NULL;
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        if($res->num_rows>0){
            $linea=$res->fetch_assoc();
            if(empty($_SESSION["nombre"])){
            $_SESSION["nick"]=$linea["nick"];
            $_SESSION["correo"]=$linea["correo"];
            $_SESSION["id"]=$linea["id"];
            $_SESSION["contraseña"]=$linea["contraseña"];
            if($linea["admin"]=="si"){
                $_SESSION["admin"]="admin";
            }
            
            }
        }
        $res->free();
        Conexion::desconectarBD($conexion);
        return $linea;
    }

    public function buscarUsuario(){
        $sql="select * from usuarios where nick='$this->nick'";
        $linea=NULL;
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        if($res->num_rows>0){
            $linea=$res->fetch_assoc();         
        }
        $res->free();
        Conexion::desconectarBD($conexion);
        return $linea;
    }

    public function hayUsuarios(){
        $sql="select * from usuarios";
        $linea=NULL;
        $conexion=Conexion::conectarBD();
        $res=$conexion->query($sql);
        if($res->num_rows>0){
            $linea=$res->fetch_assoc();         
        }
        $res->free();
        Conexion::desconectarBD($conexion);
        return $linea;
    }

}


?>