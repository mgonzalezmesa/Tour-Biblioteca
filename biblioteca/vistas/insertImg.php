<!DOCTYPE html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="bibliocss/estilo_insert_libro.css" media="screen" />	
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
	<div id="bimba">
		<div id="cualquiera">
			<?php  
			
			$idlibro = $datos;
			$directorio = "imgs/books/$idlibro";
			$arrayPag = scandir($directorio);
			$num_pag = count($arrayPag)-2;
			
			echo" <a href='index.php?accion=showIntAdmin'>Volver a la interfaz de administracion</a>";
				echo "<table>";
					echo "<tr>";
						for($i = 0;$i<$num_pag;$i++){
								if($i%4==0){
									echo "</tr>";
									echo "<tr>";
								}
								echo "<td>";
									echo "<img src='imgs/books/$idlibro/$i.jpg' height='200px' width='150px'>".
											"<form action='index.php?accion=procesarInsertImg' method='post' enctype='multipart/form-data'>".
												"<input type='hidden' name='id' value='$idlibro'>".
												"<input type='hidden' name='num_pag' value='$num_pag'>".
												"<input type='hidden' name='pagina_ant' value='".($i-1)."'>".
												"<input class='btnenviar' type='submit'/>".
												"</form>";
									echo "<a href='' class='btnBorrar'>Borrar</a>";
									echo "<p class='numeroPagina'>$i</p>";
								echo "</td>";

								echo "
									<td>
										<input type='file' class='file-input' name='fichero' accept='image/jpg'  id='input' multiple='true' onchange='handleFiles(this.files)'/>
										
										
									</td>";
							}
					echo "</tr>";
				echo "</table>";		
					
			?>
		</div>
	</div>	
</body>
