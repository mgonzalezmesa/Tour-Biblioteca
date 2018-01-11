<link rel="stylesheet" type="text/css" href="bibliocss/adminestilo.css" media="screen" />
<link rel="stylesheet" type="text/css" href="bibliocss/inserlibro.css" media="screen" />
<meta charset="UTF-8">
<?php  
	echo" <a href='index.php?accion=showIntAdmin'>Volver a la interfaz de administracion</a>";
	$tablaLibros = $datos["libros"][0];
		
			echo "
			<h1>Modificar Libro</h1>
				<div id='caja'>
					<form action='index.php' method='get'>
						<div class='group'>      
					      <input type='text' name='titulo' value='$tablaLibros[1]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Titulo</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='autor' value='$tablaLibros[2]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Autor</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='editorial' value='$tablaLibros[3]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Editorial</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='lugar_edicion' value='$tablaLibros[4]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Lugar de Edición</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='fecha_edicion' value='$tablaLibros[5]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Fecha de Edicion</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='ISBN' value='$tablaLibros[6]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>I S B N </label>
					    </div>
						<div class='group'>      
					      <input type='text' name='tipo' value='$tablaLibros[7]' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Tipo</label>
					    </div>
					<input type='hidden' name='id_libro' value='$tablaLibros[0]'><br/><br/>
					<input type=\"hidden\" name=\"accion\" value=\"modifiedLibro\" href='index.php?accion=modifiedLibro&id_libro=".$tablaLibros[0]."'>
					<input type='submit' class='enviar'>
				</form>
			</div>
			
	";		
			
?>