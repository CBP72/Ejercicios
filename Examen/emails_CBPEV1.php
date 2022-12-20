<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!--
		Desarrollo Web en Entorno Servidor - Tarea 1 
		Programar una aplicación para mantener una lista de teléfonos en una única página web, programada en PHP.
		La lista almacenará únicamente dos datos: número de teléfono y nombre. No podrá haber números repetidos.
		Se utilizará como modelo de datos un array de pares (teléfono, nombre)
		En la parte superior de la página web se mostrará un título y los resultados obtenidos
		En la parte inferior tendremos un sencillo formulario, una casilla de texto para el teléfono y otra para el nombre.
		Al pulsar el botón, se ejecutará alguna de las siguientes acciones:
				•	Si el número está vacío o no cumple el patrón de validación especificado, se mostrará una advertencia.
				•	Si se introduce un número válido que no existe en la lista, y el nombre  no está vacío, se añadirá a la lista.
				•	Si se introduce un número válido que existe en la lista y se indica un nombre, se sustituirá el nombre anterior.
				•	Si se introduce un número válido que existe en la lista pero sin nombre, se eliminará el teléfono de la lista
				•	Si se introduce un nombre que exista dejando el teléfono en blanco, se visualizará una lista con todos los teléfonos asociados
		
		Como mecanismo de "persistencia" utilizaremos un array que está en el formulario como elemento oculto y se envía.
		
		Consultar y comprender el funcionamiento de métodos: explode, implode, array_search >> utilizados en el código		
--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		La aplicación debe cumplir los siguientes requisitos: 

		La lista almacenará pares de datos: (email , nombre). Los valores de email serán únicos. Para almacenar los datos, se utilizará un array. (3 puntos)
		La página llevará un encabezado que diga LISTADO DE... y después las iniciales de tu nombre y apellidos (por ejemplo, en mi caso LISTADO DE CPM). (4 puntos)
		En la parte superior de la página web se mostrarán SIEMPRE todos los datos que haya, si los hay: primero el nombre, en negrita, después el email, después un salto de línea. (6 puntos) Si no hay datos, se mostrará un mensaje que diga "NO HAY DATOS" (6 puntos)
		Al pulsar el botón ENVIAR, se ejecutará el propio script PHP  (2 puntos), enviando la lista convertida en una sola cadena de texto.  (5 puntos) Además, se ejecutará alguna de las siguientes acciones:
		Si se introduce un email que no existe en la lista, y un nombre, se añadirá el nuevo par a la lista. (3 puntos)//no existe true true añadir
		Si se introduce un email que existe en la lista y un nombre, se sustituirá el nombre anterior para ese email. (3 puntos) existe  true true sustituir nombre
		Si se introduce un email que existe en la lista pero sin nombre, se eliminará el par de la lista. (3 puntos) existe true false
		Si se introduce un nombre que existe dejando el email en blanco, se visualizarán una lista con todos los emails asociados a ese nombre, debajo de la lista general.  (3 puntos) existe false true mostra lista solo con el nombre enviado
		Abre un archivo de texto
		Ejecuta el script sin datos y pega una captura en el archivo (3 puntos)
		Añade cuatro pares de datos, dos de ellos con tu nombre, y pega una captura en el archivo (3 puntos)
		Saca el listado de los emails que llevan tu nombre, y pega una captura en el archivo (3 puntos)
		Borra el primer email de la lista, y pega una captura en el archivo (3 puntos)
		Nombra la clase con el código completo como emails.php y sube:
		
-->
<html>
		<head>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				<title>List&iacute;n telef&oacute;nico de Jos&eacute; Luis Comesa&ntilde;a</title>
				<!-- Preparamos el entorno gráfico para los datos -->
				<style type="text/css">
						td, th {border: 1px solid grey; padding: 4px;}
						th {text-align:center; background-color: #67b4b4;}
						table {border: 1px solid black;}
						div {padding: 10px 20px}
						h1 {font-family: sans-serif; font-style: italic; text-transform: capitalize; color: #008000;}
						.bajoDch {float:right; position:absolute; margin-right:0px; margin-bottom:0px; bottom:0px; right:0px;}
						.altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
						.altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
				</style>
		</head>
		
		<body>
		<?php
                    //el array con los datos que se pasan por post es $array
                    //var_dump($_POST);
        
                    // Comprobamos que se han recibido los datos 'anteriores' por POST
                    if (!empty($_POST['personas'])) {
                        // Se crea un array con todos los datos antiguos indicándole que están separados por coma
                        $array = explode("," , $_POST['personas']);
                        // almacenamos en 'count' el número de elementos almacenados
                        $count = count($array);
                    }else{
                        // Si no hay datos antiguos, sólo reiniciamos las variables globales
                        $array=array();
                        $count=0;
                    }
                    
                    foreach($_POST as $k=>$v){
                        echo"$k...$v...<br/>";
                        
                    }
                    
                    if(!empty($_POST['nom'])){//hay nombre
						echo"Hay nombre <br>";
                        if(!empty($_POST['email'])){//hay Email
							echo"Hay Email<br>";
                            $encontrado=findPos($array,$_POST['email']);
                            if($encontrado===false) {
                                //Email no existe INSERT
                                echo"...INSERT<br/>";
                                $array[$count++]=$_POST['email'];
                                $array[$count++]=$_POST['nom'];
                            } else {    
                                //Email existente UPDATE
                                echo "...UPDATE<br/>";
                                $array[$encontrado+1]=$_POST['nom'];
                            }

                        }else{//no hay Email 
							echo "No hay Email<br>";
                            //listado de Emails de ese nombre
                            foreach ($array as $v) {
                                echo"---$v---<br/>";
                            }
                            
        
                        }
        
                    }else{//no hay nombre
                        if(empty($_POST['email'])){//no hay Email
                            //GETALL
                            echo"...Lista...<br/>";
							$par=0;
                            foreach ($array as $v) {
								if($par%2==0)
                                	echo"Email: $v ";
								else
									echo"Nombre: $v<br>";
								$par++;
                            }						
                            echo"<br/>";
        
                        
                        }else{
                            //hay Email.. DELETE... unset
							echo"...Delete<br>";
                            $encontrado=findPos($array,$_POST['email']);
                            
                            //email existe... DELETE
                            if(!$encontrado===false||$encontrado==0) {
								echo"Borrando<br>";
                                unset($array[$encontrado]); // borro email
                                $encontrado++;
                                unset($array[$encontrado]); // borro nom
                            }
        
                        }
        
                    }
                    
                    // Función para comprobar si un nombre existe en el array
                    function findPos($miArray,$dato){
                        $posicion=array_search($dato,$miArray,false);
                        return $posicion;
                    }
				?>
                
				<!-- Capa inferior derecha para las preguntas -->
				<div class="bajoDch">
						<!-- Formulario para enviar sus datos por POST a la misma página -->
						<form name="formulario" action="" method="post">
								<table style="border: 0px;">
										<tr style="background-color: #8080ff;">Introduzca los datos 
												
												<!-- Número de teléfono -->
												<td>
														<fieldset>
																<legend>Email</legend>
																<input name="email" type="text" />
														</fieldset>
												</td>
												<!-- Nombre de la persona -->
												<td>
														<fieldset>
																<legend>Nombre</legend>
																<input name="nom" type="text" />
														</fieldset>
												</td>
										</tr>
								</table>
								<!-- Creamos un campo oculto para enviar los datos ya recogidos con anterioridad -->
								<input name="personas" type="hidden" value="<?php if (isset($array)) echo implode("," , $array) ?>" style="text-align:right;" />
								<!-- Enviamos los datos del formulario -->
								<input type="submit" value="Aceptar" /> 
						</form>
				</div>
		</body>
</html>