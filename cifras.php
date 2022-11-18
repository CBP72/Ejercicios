<?php

//sacar numero de  las cifras

define("BR","<br/>\n");
define("RED","<p style='color:red'>");

$n= 89457;
$c= $n;

$cont =0;
$cuerpo="";


while ($c>0){
    //Nueva cifra, nueva linea;
    $cont++;
    $cuerpo.="<tr>\n";


    $r=$c%10;//extraer cifra
    $c=($c-$r)/10;//actualizar el cociente

    //escribir celda con datos;

    $cuerpo.="<td  style='color:red'>$cont</td> <td style='color:blue'>$r</td> \n</tr>";
    
}



$cabecera="<html>\n<table style='border:1'>\n";;
$cierre="</table> \n</html>".BR;;

$salida=$cabecera.$cuerpo.$cierre;

echo $salida;








?>