<section>

<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    session_start();
    }
include("clases/usuario.php");

if(isset($_POST["loggear"])){

if(isset($_POST["nick"]) && isset($_POST["contraseña"])){

    $nick=$_POST["nick"];
    $contraseña=$_POST["contraseña"];

    $usr = new Usuario($nick,"",$contraseña,"","");
    if($usr->loginUsuario()){
        
        header("Location:index.php?p=portada");
       
    }
        
}

}

if(empty($_SESSION["nick"])){

?>


<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" >

<label>USUARIO</label> <br>
<input type="text" value="" name="nick"><br><br>

<label>CONTRASEÑA</label> <br>
<input type="password" value="" name="contraseña"><br><br>
<input type="submit" name="loggear" value="LOGGEAR"><br><br>
</form>
<a href="index.php?p=registro">¿No tienes cuenta? Registrate aqui</a>

<?php } ?>


</section>

