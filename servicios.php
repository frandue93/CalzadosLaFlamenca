
<script>
	
		$(document).ready(function(){
			
			//muestro una galeria de imagenes , al pulsar sobre una se engrandece y puedo navegar con las flechitas.
				
				$("#galeria a").fancybox({
					openEffect: 'fade',
					closeEffect:'fade',
					closeBtn:false,
					helpers:{
						title:{
							type:'over'
						},
						thumbs:{
							width:50
						},
						buttons:{},
						changeSpeed:12000,
						overlay:{
							css:{
								'background':'rgba(0,0,0,0.5)'
							}
						}
					}
			}); // Fin de la función FancyBox



		}); // Fin de la funcion JQuery

	</script>
<section id="servicios">
<h1> Conoce nuestra empresa</h1>
	<div id="galeria">
    <article>
	<a href="assets/imagenes/nave1.jpg" rel="galeria" title="nave 1">
		<img class="galery" src="assets/imagenes/nave1.jpg" alt=""/></a>
  </article>
  <article>
	<a href="assets/imagenes/nave2.jpg" rel="galeria" title="nave 2">
		<img class="galery" src="assets/imagenes/nave2.jpg" alt=""/></a>
  </article>
  <article>
	<a href="assets/imagenes/nave3.jpg" rel="galeria" title="nave 3">
		<img class="galery" src="assets/imagenes/nave3.jpg" alt=""/></a>
  </article>
  <article>
	<a href="assets/imagenes/nave4.jpg" rel="galeria" title="nave 4">
		<img class="galery" src="assets/imagenes/nave4.jpg" alt=""/></a>
  </article>
</div>



  </section>

   




