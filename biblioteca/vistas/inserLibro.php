<link rel="stylesheet" type="text/css" href="bibliocss/adminestilo.css" media="screen" />

<?php // Formulario de registro de libros
	$id_libro = $datos["id_libro"];

echo"
	
		<div id='insertarLibro'>
			<h1>Insertar libro</h1>
			<form action='index.php' method='get'>
				Titulo <input type='text' name='titulo'><br/>
				Autor <input type='text' name='autor'><br/>
				Editorial <input type='text' name='editorial'><br/>
				Lugar de edición <input type='text' name='lugar'><br/>
				Fecha de edición <input type='text' name='fecha'><br/>
				ISBN <input type='text' name='isbn'><br/>
				Tipo <input type='text' name='tipo'><br/>
		    	<input type='file' class='file-input' name='fichero' accept='image/jpg'  id='input' multiple='true' onchange='handleFiles(this.files)'/><br/><br/>
				<input type='hidden' name='accion' value='insertLibro'/>
				<input type='submit'>
		    
			</form>
		</div>
	
"
?>

