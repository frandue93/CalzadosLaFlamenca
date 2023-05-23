<section>

<article>
<h1>Dejanos un mensaje</h1>
 <form action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return validacion()">
 
 <label>Nombre: </label><br><input type="text" id="nombre" name="nombre" placeholder="Ejemplo :Juan" ><br><br>
 <label>Email: </label><br><input type="email" id="correo" name="correo" placeholder="correo@xxxx.xxx" ><br><br>
 <label>Edad: </label><br><input type="text" id="edad" name="edad"  placeholder="Ej: 25"><br><br>
 <label>Telefono: </label><br><input type="tel" id="telefono" name="telefono"  placeholder="Ej: 654654888"><br><br><br>
 <label>Escriba su sugerencia: </label><br>
 <textarea id="consulta" name="consulta" cols="50" rows="10"></textarea><br><br>
 <input type="submit" value="Enviar" id="enviar">
 </form>
 </article>
 
 

 
</section>


<script>


//con esta funcion validamos que esten los datos correctos 
function validarEmail(email) {
   var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
 return re.test(String(email).toLowerCase());
}

function validacion() {
 var nombre = document.getElementById("nombre").value;
 var correo = document.getElementById("correo").value;
 var edad = document.getElementById("edad").value;
 var telefono = document.getElementById("telefono").value;
 var consulta = document.getElementById("consulta").value;

 if (nombre === "" || correo === "" || edad === "" || telefono === "" || consulta === "") {
 alert("Todos los campos son obligatorios");
 return false;
 }

 if (isNaN(edad)) {
 alert("La edad debe ser numérica");
 return false;
 }

 if (telefono.length !== 9) {
 alert("El teléfono debe tener 9 números");
 return false;
 }

 if (!validarEmail(correo)) {
 alert("El correo no es válido");
 return false;
 }
}
</script> 