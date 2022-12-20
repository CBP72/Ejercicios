<!--Se dispone de una página web en el archivo ej_catalogo_A.html (en la carpeta adjunta).

Se pide:

Colocar en la página una cabecera con tu identificador de examen (5 puntos)
Identificar los fragmentos de código que pueden ser generados dinámicamente, para ser sustituidos. (5 puntos)
Almacenar los datos de esos fragmentos en arrays con una estructura adecuada.  (10 puntos)
Añadir en el array de productos un campo que indique para cada producto cuántas unidades tiene, que serán las que se muestren en el campo de opciones. (15 puntos)
Insertar fragmentos de código en PHP en la página que sustituyan a los fragmentos del apartado 
    1. Para conseguirlo, los elementos con estructura similar serán generados dinámicamente utilizando estructuras de programación adecuadas para manejar las estructuras de datos del apartado 
    2. (15 puntos)-->

<!--ej_catalogo_A_CBPEV1.php-->
<!DOCTYPE html>
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTIÓN DE VENTASFORM-/ut3/put3/index.php</title>
</head>
<body> 
    <br><div style="width:100%; height:20%; text-align:center; margin:1%;"><h1>BIENVENIDO a GESVENTAS</h1>
	<?php
        $menu = array(
            "LOGIN" => "login.php",
            "REGISTRARSE"=>"registro.php",
            "LOGOUT"=> "logout.php",
            "INICIO"=> "index.php",
        );
        foreach($menu as $k =>$v)
            echo" <a href='http://localhost/gesventa/$v' \nstyle='margin: 0% 3%;'>$k</a>\n";?> 
</div><div style="overflow:hidden; width:100%; height:80%;">
	 <div id="tables" style="float:left; width:30%; ">
        <form action="http://localhost/ut3/put3/index.php" method="POST">  <!--target="_blank"--> 	</form>
            <fieldset>
             <legend>Gestionar: </legend>
			 
<table>
<tbody>
        <?php
        $columnaTabla  = array("clientes","facturas","productos");
        $pantalla="";
        foreach($columnaTabla as $k =>$v){
            $pantalla.="<tr><form action='http://localhost/gesventa/panel.php' method='POST'></form>\n";
            $pantalla.="<td>$v</td>\n";
            $pantalla.="<td><select name='accion'>\n";
            $pantalla.="<option value='query'>CONSULTAR</option>\n";
            $pantalla.="<option value='insert'>NUEVO REGISTRO</option>\n";
            $pantalla.="</select></td>\n";
            $pantalla.="<input type='hidden' name='table' value='$v'>\n";
            $pantalla.="<td><input type='submit' value='IR'></td>\n";
            $pantalla.="</tr>\n";
        }
        echo $pantalla;?>
</tbody></table>				
</fieldset>		  
<div>
	<fieldset>
	   <legend>Filtros: </legend>
        <strong>productos: query</strong><br>
            <table>
                <form action="http://localhost/gesventa/panel.php" method="POST"></form>
                <tbody>
                    <?php
                        $codigo=array("cod"=>"number","nom_prod"=>"text","pvp"=>"number","existencias"=>"number");
                        $pantalla="";
                        foreach($codigo as $k=>$v){
                            $pantalla.="<tr>\n";
                            $pantalla.="<td><label for='$k'>$k</label></td>\n";
                            $pantalla.="<td><input type='$v' name='fields[$k]'></td>\n";
                            $pantalla.="</tr>\n";

                        }
                        echo $pantalla;
                    ?>
                </tbody>
            </table>
<input type="hidden" name="table" value="productos">
<input type="hidden" name="accion" value="query">
<br><input type="submit" value="ENVIAR" style="float:right;">

	 </fieldset>
			  </div>
	</div> 
			
	<div id="cuerpo" style="width:70%; float:left;">
	 <fieldset>
	   <legend>Resultados: </legend>
	<h3>RESULTADOS</h3>	
<br>
<table style="border: none; width:100%;">
    <tbody>
        
                        
        <?php
            $matriz = [
                ["Z323", "71.90", "J04131348","auriculares-mp3.jpg","1"],
                ["Z623", "209.00", "J04131348","batmanbot.jpeg","2"],
                ["Z906","399.00","J04131348","cargador.jpg","3"],
                ["Z506","125.00","J04131348","auriculares-mp3.jpg","4"],
                ["Orb Weaver","129.99","P3941094I","orbweaverchroma.png","23"],
                ["Black Widow","149.00","P3941094I","envy-phoenix-810-401lns.jpg","24"],
            ];
            $pantalla="";
            for($i=0;$i<sizeof($matriz);$i++){
                $pantalla.=" <tr style='padding: 0 20% 0 0;'>\n
                <form action='http://localhost/gesventa/panel.php' method='POST'></form><td style='left:10px;'>".$matriz[$i][4];
                $pantalla.="</td>\n";
                for($j=0;$j<4;$j++){
                    
                    $pantalla.="<td style='left:10px;'>".$matriz[$i][$j]."</td>\n";
                };
                $pantalla.="<td><select name='uds'>\n
                <option value='0' selected=''>0</option>\n";
                if($i<3){
                    for($j=1;$j<7;$j++){
                        $pantalla.="<option value='$j'>$j</option>";
                    }
                }
                $pantalla.="</select></td><td><br><input type='submit' name='".$matriz[$i][4];
                $pantalla.="' value='AÑADIR'></td>\n<input type='hidden' name='prod' value='".$matriz[$i][4];
                $pantalla.="'>\n</tr>\n";
        }
        echo $pantalla;?>
</tbody>
</table>
	
	
	</fieldset>
	
    </div>
	
	</div>

</body></html>