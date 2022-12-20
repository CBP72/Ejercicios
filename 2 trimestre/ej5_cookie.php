<?php

setcookie('visita',date('d/M/Y h:i:s'));

if(!isset($_COOKIE['cont'])||isset($_POST['reiniciar'])){
    setcookie('cont','',time()-1);//borrar cooki
    setcookie('cont',1);
    echo"Primera vez <br>\n";
    
}else{
   
    setcookie('cont',$_COOKIE['cont']+1);
   echo "Has entrado ".$_COOKIE['cont']." veces<br>\n";
}
echo $_COOKIE['visita'];


function mssg ($c){}


?>
<!DOCTYPE html>
<head></head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <button name="reiniciar" value="klk">Reiniciar Contador</button>
        <button name="continuar" value="klk">Continuar</button>
    </form>
</body>