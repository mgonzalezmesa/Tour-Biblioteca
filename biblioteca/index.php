<meta charset="UTF-8">
<?php

    include("vista.php");
	include("libro.php");
	
	
    $vista = new Vista();
	$libro = new Libro();

	//Para descargar biches
	//header("Content-Type: application/octet-stream");
	//header("Content-Disposition: attachment; filename=download.pdf");
	//header("Content-Transfer-Encoding: binary");
	//readfile(imgs/books/6/download.pdf);

    if (isset($_REQUEST["accion"]))
        $accion = $_REQUEST["accion"];
    else
        $accion = "showPortada";  // Acción por defecto

    switch ($accion) {
        case "showPortada":
            $vista->show("portada");
            break;
		
		case "showIntAdmin":
			$datos["tabla"] = $libro->get_info();
			$vista->show("IntAdmin",$datos);
			
			break;
			
		case "modificarLibro":
		
			$id_libro=$_REQUEST["id"];
			$resultado= $libro->update($id_libro);
			
			$datos["libros"] = $resultado;
			
			$vista->show("modificarLibro", $datos);
			break;	
		case "showInsertLibro":
			$vista->show("inserLibro");
			break;
			
		case "modifiedLibro":
			$id_libro=$_REQUEST["id_libro"];
			print_r($id_libro);

			$resultado=$libro->actualizarLibro($id_libro);
			if($resultado){
				$datos["tabla"] = $libro->get_info();
				$vista->show("IntAdmin",$datos);
			}

		break;
		case "deleteLibro":
			$id_libro = $_REQUEST["id"];
			$resultado = $libro->deleteLibro($id_libro);
			$datos["tabla"] = $libro->get_info();
			$vista->show("IntAdmin",$datos);
			break;
		case "showInsertImg":
			$datos = $_REQUEST["id"];
			$vista->show("insertimg",$datos);
		break;
		case "procesarInsertImg":
			$id_libro = $_REQUEST["id"];
			$pag_ant = $_REQUEST["pagina_ant"];
			$num_pag = $_REQUEST["num_pag"];
			$libro->renomDir($id_libro,$pag_ant,$num_pag);
			$libro->insertarImagen($id_libro, $pag_ant);
			$datos = $_REQUEST["id"];
			$vista->show("insertImg",$datos);
		break;

		//RENOMBRAR ARCHIVOS 
		case "renom":
			$id_libro = $_REQUEST["id"];
			$datos["todo"]=$libro->rename_cont($id_libro);
			$vista->show("prueba");
		break;
    }

?>
