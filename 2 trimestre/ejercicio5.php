<!DOCTYPE HTML PUBLIC>
<?php
    //echo "Sesion iniciada con id: ".$SESSION_id();

    session_start();
    if(!isset($_SESSION['cont'])){
        $_SESSION['cont']=1; 
        echo"Primera vez que entras";
    }
    echo"<br>",$_SESSION['cont']." Visitas";
    $_SESSION['cont']=$_SESSION['cont']+1;
   
?>
<html>
    <head>
        <title>Sesion Ej5</title>
    </head>
    <body>
        <h1> Sesion ejercicio 5</h1>
    </body>
</html>