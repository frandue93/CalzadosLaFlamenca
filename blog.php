

<section id="secBlog">

   <aside class="derecha">
   
   </div>

   </aside>

   
   <aside class="centro">
   <div id="video"><h2>Video promocional</h2>
      
      <iframe width="560" height="315" src="https://www.youtube.com/embed/yFnEM4uYFJc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
   <div id="mapa"><H2>Nuestra tienda se encuentra aqui</H2>
   <iframe  src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d100658.01350506168!2d-1.2182732112888608!3d37.96399033759851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0xd637f5b19f36d35%3A0x9b03172fb3008dbe!2sCarril%20Gines%20El%20Lechero%2C%206%2C%2030152%20Aljucer%2C%20Murcia!3m2!1d37.964010699999996!2d-1.1482331!5e0!3m2!1ses!2ses!4v1669655844763!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>     
      <div id="tempCiud"></div>
   </div>

   
</aside>


<script>

//obtener ciudad y temperatura de conexión mediante Ajax a API meteorológica
navigator.geolocation.getCurrentPosition(Ubicacion);

function Ubicacion(position) {
    var latitud = position.coords.latitude;
    var longitud = position.coords.longitude;

    $.ajax({
            type: 'GET',
            url: 'http://api.openweathermap.org/data/2.5/weather?lat=' + latitud + '&lon=' +
                longitud + "&units=metric&appid=9f50a805aa0089a1edd1829a5db029f0",
            dataType: 'json'

        })

        .done(function(data) {
            console.log(data);
            var temperatura = data.main.temp;
            var ciudad = data.name;
            localStorage.setItem("Temperatura", temperatura);
            localStorage.setItem("Ciudad", ciudad);
        }) //fin de conexión Ajax
}

//creación de párrafo para introducirlo en el div
var temperatura = localStorage.getItem("Temperatura");
var ciudad = localStorage.getItem("Ciudad");

var texto = "La temperatura actual en " + ciudad + " es de " + temperatura + " grados Celsius.";
document.getElementById("tempCiud").innerHTML = texto;
 
</script>
</section>




