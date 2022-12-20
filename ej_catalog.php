

<!DOCTYPE html>
<!-- saved from url=(0035)http://localhost/gesventa/panel.php -->
<html lang='es'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>GESTIÓN DE VENTASFORM-/ut3/put3/index.php</title>
    <style>
        h1:hover{
            color: white;
            background-color: black;

        }
        h3{
            color: black;
        }
        h3:hover{
            color: red;
        }

    </style>
</head>
<body> 
<br><div style='width:100%; height:20%; text-align:center; margin:1%;'><h1>BIENVENIDO a GESVENTAS</h1>

<?php
        $menu = array(
            "LOGIN" => "login.php",
            "REGISTRARSE"=>"registro.php",
            "LOGOUT"=> "logout.php",
            "INICIO"=> "index.php",
            "CARRITO"=> "carrito.php"
        );

        foreach($menu as $k =>$v)
            echo" <a href='http://localhost/gesventa/$v' \nstyle='margin: 0% 3%;'>$k</a>\n";

       /* <a href='http://localhost/gesventa/login.php' style='margin: 0% 3%;'>LOGIN</a>
        <a href='http://localhost/gesventa/registro.php' style='margin: 0% 3%;'>REGISTRARSE</a>
        <a href='http://localhost/gesventa/logout.php' style='margin: 0% 3%;'>LOGOUT</a>
        <a href='http://localhost/gesventa/index.php' style='margin: 0% 3%;'>INICIO</a>
        <a href='http://localhost/gesventa/carrito.php' style='margin: 0% 3%;'>CARRITO</a>*/
 ?>   
</div>

<div style='overflow:hidden; width:100%; height:80%;'>
	 <div id='tables' style='float:left; width:30%; '>
        <form action='http://localhost/ut3/put3/index.php' method='POST'>  <!--target='_blank'--> 	</form>
            <fieldset>
             <legend>Gestionar: </legend>
			 
<table>
<tbody>
    <?php

        $gestion  = array("clientes","facturas","productos","proveedores","usuarios");
        $pantalla ="";
        foreach($gestion as $k => $v){

            $pantalla="<tr><form action='http://localhost/gesventa/panel.php' method='POST'></form>\n";
            $pantalla.="<td>$v</td>\n";
            $pantalla.= "<td><select name='accion'>\n";
            $pantalla.= "<option value='query'>CONSULTAR</option>";
            for($j=1;$j<11;$j++){
                    
                $pantalla.="<option value='$j'>$j</option>";
            };
            $pantalla.=" </select></td>\n";
            $pantalla.="<input type='hidden' name='table' value='$v'>\n";
            $pantalla.=" <td><input type='submit' value='IR'></td>\n</tr>\n";
            echo $pantalla;
        }

?>
</tbody></table>				
			</fieldset>
			  
			  
			  <div>
			  <fieldset>
	   <legend>Filtros: </legend>
<strong>productos: query</strong><br>
<table>
<form action='http://localhost/gesventa/panel.php' method='POST'></form>
    <tbody>
        <?php
            $filtros=array("cod"=>"number","nom_prod"=>"text","pvp"=>"number","prov"=>"text","imagen"=>"text","existencias"=>"number");
            $pantalla="";
            foreach($filtros as $k=>$v){
                $pantalla.="<tr>\n
                <td><label for='$k'>$k</label></td>\n
                <td><input type='$v' name='fields[$k]'></td>\n
            </tr>\n";

            }
            echo $pantalla;
            

        ?>
</tbody></table>
<input type='hidden' name='table' value='productos'>
<input type='hidden' name='accion' value='query'>
<br><input type='submit' value='ENVIAR' style='float:right;'>

	 </fieldset>
			  </div>
	</div> 
			
	<div id='cuerpo' style='width:70%; float:left;'>
	 <fieldset>
	   <legend>Resultados: </legend>
	<h3>RESULTADOS</h3>
	
<br>
<table style='border: none; width:100%;'>
    <tbody>
        <?php 
            $matriz = [
                ["Z323", "71.90", "J04131348","auriculares-mp3.jpg"],
                ["Z623", "209.00", "J04131348","batmanbot.jpeg"],
                ["Z906","399.00","J04131348","cargador.jpg"],
                ["Z506","125.00","J04131348","auriculares-mp3.jpg"],
                ["Argon","50.00","D7767763A","regulador-botella-argon.jpg"],
                ["Neon","35.00","D7767763A","neon.jpg"],
                ["Ocelote","59.90","D7767763A","raton-ocelote-gaming.jpg"],
                ["Death Stalker","299.99","P3941094I","razer-deathstalker-chroma-keyboard.jpg"],
                ["Orb Weaver","129.99","P3941094I","orbweaverchroma.png"],
                ["Black Widow","149.00","P3941094I","envy-phoenix-810-401lns.jpg"],
                ["Envy Phoenix 810-401ns","2599.00","A36109494","envy-phoenix-810-401lns.jpg"],
                ["Envy Recline 23-k301ns","1399.00","A36109494","pavillon-500-354ns.jpg"],
                ["Pavilion 500-354ns","499.00","A36109494","pavillon-500-354ns.jpg"],
            ];
            
           
        
            $tabla="";
            for($i=0;$i<sizeof($matriz);$i++){
                $tabla.=" <tr style='padding: 0 20% 0 0;'>\n
                    <form action='http://localhost/gesventa/panel.php' method='POST'></form><td style='left:10px;'>".$i+1;
                $tabla.="</td>\n";
                for($j=0;$j<4;$j++){
                    
                    $tabla.="<td style='left:10px;'>".$matriz[$i][$j]."</td>\n";
                };
                $tabla.="<td><select name='uds'>\n
                <option value='0' selected=''>0</option>\n
                ";
                for($j=1;$j<101;$j++){
                    
                    $tabla.="<option value='$j'>$j</option>";
                };
                $tabla.="</select></td><td><br><input type='submit' name='".$i+1;
                $tabla.="' value='AÑADIR'></td>\n
                <input type='hidden' name='prod' value='".$i+1;
                $tabla.="'>\n
            
                </tr>\n";
            }
        
            echo $tabla

        
        
        ?>
    </tbody>
</table>
	
	
	</fieldset>
	
    </div>
	
	</div>

</body></html>