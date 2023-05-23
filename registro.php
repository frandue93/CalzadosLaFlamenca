<?php 

include("lib/fecha.php");
include("lib/correo.php");
include("clases/usuario.php");

$correo="";
$nick="";
$contraseña="";
$contraseña2="";
$fechaDia="";
$fechaMes="";
$fechaAño="";
$fechaNacimiento="";
$msg="";
function validarRegistroUsuario($nick,$contraseña,$contraseña2,$correo){
    if(empty($nick)||empty($contraseña)||empty($contraseña2)||!validarCorrecto($correo)){
      
        return false;
      
    }else{

    if($contraseña=$contraseña2){
    return true;
    }
  }
}


if(isset($_POST["registroUsuario"])){

    $correo=$_POST["correo"];
    $nick=$_POST["nick"];
    $contraseña=$_POST["contraseña"];
    $contraseña2=$_POST["contraseña2"];
    $fechaDia=$_POST["fechaDia"];
    $fechaMes=$_POST["fechaMes"];
    $fechaAño=$_POST["fechaAño"];

   
    if(dmy2date($fechaDia,$fechaMes,$fechaAño)){
        $fechaNacimiento=dmy2date($fechaDia,$fechaMes,$fechaAño);
      
      if(validarRegistroUsuario($nick,$contraseña,$contraseña2,$correo)){
        $usr = new Usuario($nick,$correo,$contraseña,$fechaNacimiento,"");
        $admin = $usr->hayUsuarios();
        if($admin==""){
          $usr->guardaAdmin();
          header("Location: index.php?p=iniciarSesion");
        }else{


        $buscar = $usr->buscarUsuario();
        if(empty($buscar)){
      $msg  =$usr->guardaUsuario();
        header("Location: index.php?p=iniciarSesion");
      }else{
        
         $msg="El usuario ya existe";
      }
    }
    }else{
       $msg="Datos incorrectos";

    }

  }
    
}


?>


<section>
<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >

<label>DIRECCION DE CORREO</label> <br>
<input type="text" value="" name="correo"><br><br>

<label>USUARIO</label> <br>
<input type="text" value="" name="nick"><br><br>


<label>CONTRASEÑA</label> <br>
<input type="password" value="" name="contraseña"><br><br>

<label>CONTRASEÑA</label> <br>
<input type="password" value="" name="contraseña2"><br><br>

<label>FECHA NACIMIENTO:*</label><br> 
<label>Dia: </label><input type="text" name="fechaDia" value="" size="2"> Mes: <input type="text" name="fechaMes" value="" size="10"> Año: <input type="text" name="fechaAño" value="" size="4"><br><br>


<input type="submit" name="registroUsuario" value="Registrarse"><br><br>

</form>

<p><?php echo $msg ?></p>
</section>