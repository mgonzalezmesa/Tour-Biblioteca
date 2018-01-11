<?php
	include_once ("basedatos.php");
	class Libro{

		private $db;

		public function __construct() {
			$this->db = new Basedatos();
		}
        
		public function get_info(){
            $this->db->conectar();
            $tabla = $this->db->consulta("SELECT * FROM libros");
            $this->db->desconectar();
            return $tabla;
		}
		public function update($id_libro){
			$this->db->conectar();
            $tabla = $this->db->consulta("SELECT * from libros where id_libro = '$id_libro'");
            $this->db->desconectar();
			
			return $tabla;
		
		}
		public function actualizarLibro($id_libro){
			$titulo=$_REQUEST["titulo"];
			$autor=$_REQUEST["autor"];
			$editorial=$_REQUEST["editorial"];
			$lugar=$_REQUEST["lugar_edicion"];
			$fecha=$_REQUEST["fecha_edicion"];
			$isbn=$_REQUEST["ISBN"];
			$tipo=$_REQUEST["tipo"];

			$this->db->conectar();
			$res = $this->db->manipula("Update libros set titulo='$titulo', autor='$autor',editorial='$editorial',lugar_edicion='$lugar', fecha_edicion='$fecha', ISBN='$isbn', tipo='$tipo' where id_libro='$id_libro'");
			print_r($res);
			$this->db->desconectar();
			return $res;
		}
		public function deleteLibro($id_libro){
            $this->db->conectar();
            $res = $this->db->manipula("Delete  from libros WHERE id_libro='$id_libro'");
            $this->db->desconectar();
         	
            return $res;
			
		}
		//renombrar imagenes
		public function renomDir($id_libro,$pag_ant,$num_pag){
			for($i=$num_pag-1;$i>$pag_ant;$i--){
				$oldDir="imgs/books/$id_libro/1(".($i+1).").jpg";
				$newDir="imgs/books/$id_libro/".($i+1).".jpg";
				rename($oldDir,$newDir);
			}
		}

		//crear carpeta con el siguiente id de la base de datos
		
		public function getmaxIDLibro(){
			$this->db->conectar();
            $tabla = $this->db->consulta("SELECT MAX(id_libro) from libros");
            $this->db->desconectar();

			return $tabla;
		}

		public function insertarImagen($id_libro, $pag_ant) {
			
			$target_file = "imgs/books/$id_libro/" . ($pag_ant + 1). ".jpg";
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			if (move_uploaded_file($_FILES['fichero']['tmp_name'], $target_file)) {
			    echo "El fichero es válido y se subió con éxito.\n";
			} else {
			    echo "¡Posible ataque de subida de ficheros!\n";
			}

		}

		public function insertarImgsLibros($id_libro) {
			

			$target_file = "imgs/books/$id_libro/jpg";
			//$target_file = "imgs/books/$id_libro/" . $_FILES["fichero"]["name"];
			echo $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			if (move_uploaded_file($_FILES['fichero']['tmp_name'], $target_file)) {
			    echo "El fichero es válido y se subió con éxito.\n";
			} else {
			    echo "¡Posible ataque de subida de ficheros!\n";
			}

		}

		public function insertLibro(){
			

			$titulo=$_REQUEST["titulo"];
			$autor=$_REQUEST["autor"];
			$editorial=$_REQUEST["editorial"];
			$lugar=$_REQUEST["lugar"];
			$fecha=$_REQUEST["fecha"];
			$isbn=$_REQUEST["isbn"];
			$tipo=$_REQUEST["tipo"];

            $this->db->conectar();
            $res = $this->db->manipula("INSERT INTO libros(id_libro,titulo,autor,editorial,lugar_edicion,fecha_edicion,ISBN,tipo) VALUES ('$titulo','$autor','$editorial','$lugar','$fecha','$fecha','$isbn','$tipo')");
            $this->db->desconectar();
         	
            return $res;
		}


		//Renombrar archivos de una carpeta
		public function rename_cont($id_libro){
			$ruta ="imgs/books/$id_libro";
			$carpeta = scandir($ruta,SCANDIR_SORT_NONE);
			$cantidadarchivos=count($carpeta);

			for($i=0;$i<$cantidadarchivos;$i++){
				print_r($carpeta[$i]);
				/*$oldDir="imgs/books/$id_libro/".$carpeta[$i].".jpg";
				$newDir="imgs/books/$id_libro/".$i.".jpg";
				rename($oldDir,$newDir);*/
			}
		}

	}

?>
