<!DOCTYPE html>
<html lang="es">
 <head>
 
     
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     
     <title>CeliaTour</title>
     <link rel="stylesheet" href="web/estilo.css"/>
     <!---
     <link href='http://fonts.googleapis.com/css?family=Wellfleet' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'> 
     <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
     <link href='http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911' rel='stylesheet' type='text/css'>

    -->
     <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
     
     <link href="https://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet">
      <link rel="shortcut icon" href="web/img/icono.ico">

        <link rel="stylesheet" type="text/css" href="/php/celia/biblioteca/css/estilo.css" media="screen" />
        <link rel="stylesheet" href="/php/celia/biblioteca/css/font-awesome-4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="biblioteca/extras/jquery.min.1.7.js"></script>
        <script type="text/javascript" src="biblioteca/extras/jquery-ui-1.8.20.custom.min.js"></script>
        <script type="text/javascript" src="biblioteca/extras/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="biblioteca/extras/modernizr.2.5.3.min.js"></script>
        <script type="text/javascript" src="biblioteca/lib/hash.js"></script>
        <script type="text/javascript" src="biblioteca/js/jquery-3.2.1.js"></script>
        
        <script type="text/javascript" src="biblioteca/js/bootstrap.min.js"></script> 
        
        <link rel="stylesheet" href="biblioteca/css/bootstrap.min.css">
        <link href="biblioteca/css/hover.css" rel="stylesheet" media="all">
        
        <link rel="stylesheet" type="text/css" href="/php/celia/biblioteca/css/estilo.css" media="screen" />
        
        
        <link rel="stylesheet" href="/php/celia/biblioteca/css/animate.css">
        

</head>
<script>
            //Rellena el div de la ventana modal con el libro.php
            
            $( document ).ready(function() {
                $('.efectBook').click(function(){
                    idlibro = $(this).attr("idlibro");
                    $('#modal-body').load('biblioteca/vistas/libro.php', {'idlibro': idlibro});
                })
            });
            
        </script>
    
    <body>
     <div id="cambio">
         <img id="libre" src="web/img/portadalibremini2.png">
         <img id="destacado" src="web/img/portadadestacadamini.png">
         <img id="guiada" src="web/img/portadaguiadamini.png">
         
     </div>
        
        <header id="header">
            <div class="contenedor">
            <nav id="nav">
             <ul>
                 <li><img src="web/img/logo.png"/> </li>
                 <li><a href="pannellum.html" id="opcionlibre">Modo Libre</a></li>
                 <li><a href="#" id="opcionguiada">Visita Guiada</a></li>
                 <li><a href="#" id="opciondestacada">Puntos D</a></li>
				 <li><a href="#" >Biblioteca</a></li>
                 <li><a href="#" >Glosario</a></li>
                 <li><a href="#" >Creditos</a></li>
                
             </ul>
            </nav>
            </div>
        </header>
        <main>
             <div id="slider1">
                 <div class="contenedor">
                    
                     <!--<div id="retrato"> </div>
                     <div id="coso"></div>
                     <div id="coso2"></div>-->
                     <h1>Celia Tour</h1>
                     <!-- <h2 style="text-align: center">Tour 360</h2> -->
                     <div id="separador"> </div>
                     <div id="lazo"></div>
                     <div id="coso3"> </div>
                    <h2 aling="center">Historia</h2>
                         
                 </div> 
             </div> 

            <div class="modal fade" id="ventana1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Biblioteca I.E.S CELIA VIÑAS</h2>
                                </div>
                                <div class="modal-body fondo">
                                    <?php
                                        $conexdb = new mysqli('localhost','root','','biblio');
                                            if (!$conexdb) {
                                                die('Error al conectarse a mysql: ' . mysql_error());
                                            }

                                        $consult=$conexdb->query("Select id_libro from libros");
                                                    print_r($consult);
                                        $Arrayportada = $consult->fetch_all(MYSQLI_ASSOC);
                                            echo "<div class='estanteria'>";        
                                                echo "<table>"; 
                                                    echo "<tr>";                                            
                                            foreach ($Arrayportada as $ides){
                                                //Sacamos las portadas de los libros
                                                    
                                                    echo "<td class='columna'>";
                                                        echo "<img data-toggle='modal' data-target='#ventana2' idlibro='".$ides['id_libro']."' class='efectBook' src='imgs/books/$ides[id_libro]/0.jpg' height='250px' width='200px'>";
                                                    echo "</td>";   
                                                
                                            }
                                                    echo "</tr>";
                                                echo "</table>";
                                            echo "</div>";
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>          
                            </div>
                                    
                        </div>
                        
                    </div>

                    <div class="modal fade" id="ventana2" role="dialog">
                         <div class="modal-dialog modal-lg" >
                    <!-- Modal content background-color:transparent;  -->
                        <div class="modal-content" style=" width: 135%;margin-left: -165px; -webkit-box-shadow: 0 0px 0px rgba(0,0,0,.5);">
                            <!-- Aqui vendria el titulo del LIBRO -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Titulo Libro</h4>
                            </div>
                            <!-- Cuerpo de modal carga el libro.php -->
                            <div class="modal-body" id="modal-body">
                                        
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                </div>
            </div>
            <a href="#ventana1" class="btn btn-primary btn-lg" data-toggle="modal">Ver libros en nuestra biblioteca</a> 
            <a href="biblioteca/index.php?accion=showIntAdmin" class="btn btn-primary btn-lg" data-toggle="modal">Administrar</a> 











<!--
             <div id="slider2">
                 <div class="contenedor" >
                 <div class="textico_contenedor2">
                     <h3>Origenes</h3>
                 <p class="textico">El Colegio de Humanidades, fundado por el Excmo. Ayuntamiento de Almería con el nombre de Colegio de Santo Tomás de Aquino, fue sustituido por el Instituto de Segunda Enseñanza como consecuencia del Real Decreto de 17 de Septiembre de 1845 para la Instauración de la Enseñanza Oficial, siendo uno de los primeros que empezaron a funcionar en Andalucía.
                    

                    </p>
                     <img src="web/img/origins.JPG" alt="I.E.S Celia Viñas">
                 </div> 
                 </div> 
             </div> 
             <div id="slider3">
                 <div class="contenedor">
                     <div class="textico_contenedor">
                     <p class="textico2">Es un majestuoso edificio de carácter historicista de sótano y tres plantas, altos techos y con arranques de piedra noble de cantería y gruesos muros de mampostería en sus tres plantas superiores. Era tal su monumentalidad y envergadura para la Almería de la época que las licitaciones y subastas quedaron desiertas, no terminándose el edificio hasta 1931. <br>
                         Durante años fue el edificio más alto de la ciudad en competencia con el de las mariposas en Puerta de Purchena y con otro de la plaza Circular.</p>
                        
                         
                     </div> 
                 </div> 
             </div> 

             <div id="slider4">
                 <div class="contenedor">
                     <div class="textico_contenedor">
                     <p class="textico">“Lorito real,
                         lorito español,
                         canta tu amarilla
                         tonada de sol.
                            <br>
                         -¡A real! ¡A real!
                             <br>
                         En mi jaula estoy
                         comiendo avellanas,
                         bebiendo sifón.
                             <br>
                         -Lorito real,
                         me sé la lección:
                         dos y dos son cuatro.
                         Aquí y en Japón.” </p>
                     <img src="web/img/retratomini.png" align="left"/> <h4 class="autor">Celia Viñas Olivella</h4>
                     </div> 
                 </div> 
             </div> 

             <div id="slider5">
             <div class="contenedor">
                    <div class="mapa">
                        <a href="web/historiaceliavi%C3%B1a.pdf" >Leer más sobre la historia del Celia Viñas</a>
                    </div>            
             </div>
             </div>
-->
        </main>
        
        <footer>
            <div id="elamo">Celia Tour 360</div>
        </footer>
        
        <script src="web/jquery-3.2.1.min.js"></script>
        <script src="web/efectos.js"></script>
        
</body>
</html>