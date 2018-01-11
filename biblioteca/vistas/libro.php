<script type="text/javascript" src="js/turn.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#flipbook").turn({
					width: 1000,
					height: 400,
					elevation: 50,
					autoCenter: true,
					duration:2500
				
				});
			//abrir libro
				setTimeout(function() {
					$('#flipbook').turn('page', 2);
					},1000);
				});
			//agrega la funcion para la accion del link  a la pagina previa
				 $('.prev_page').click(function(){
				  $('#flipbook').turn('previous');
				 });
				 
			//agrega la funcion para la accion del link a la pagina siguiente
				 $('.next_page').click(function(){
				  $('#flipbook').turn('next');
				 });
				 
			//capturar teclas derecha e izquierda
			
			//zoom
				$('#flipbook').turn('zoom', 0.5, 0);
				
				$('#flipbook').bind('zooming', function(event,  newZoomValue, currentZoomValue) {
				  alert('New zoom: '+currentZoomValue);
				});
				
			//desaperecer libro
				/*setTimeout(function() {
				$('#flipbook').fadeOut(1500);
				},3000);*/
			//
			$('.pepico').click(function(){
				//$('#flipbook').css({"-webkit-transform":"scale(1.3)", "transform":"scale(1.3)"});
				//$('#flipbook').addClass('papa');
				$('.gradient').animate({transform: 'translateY(-100px) rotate(1rad) scaleX(2) skewY(42deg)'});
			});
		</script>
 


		<div id="bloque" class="animate">
			<!--<div id="banner" style="position:absolute; background-color:red; width: 100%; height:50px"></div>-->
			<a href="#" class="prev_page"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
			<a href="#" class="next_page a"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			<a href="#" class="prev_page"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
			<!-- <a href="#" class="pepico">zoom</a> -->
			<div id="flipbook" class="animated ">
				
				<?php
					
					$libro = $_REQUEST["idlibro"];
					$directorio = "../imgs/books/$libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;

					for($i = 0;$i<$num_pag;$i++){
						if((($i==0 || $i==1) || $i==$num_pag-1) || $i==$num_pag-2)
							echo"<div class=\"hard gradient\"> <img src=\"biblioteca/imgs/books/$libro/$i.jpg\" /> </div>";
						else
							echo "<div class=\"pag gradient\"> <img src=\"biblioteca/imgs/books/$libro/$i.jpg\" /> </div>";
					}
				?>
				
			</div>
			
		</div>
