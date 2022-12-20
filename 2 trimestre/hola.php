

<?php

session_start();
if(!isset($_SESSION['user'])){
    echo "NO puedes entrar en la página<br/><br/>\n";
}
else{
    echo "Bienvenido ".$_SESSION['user']."<br/>\n";
   
}

echo"<a href='ses_6_login.php'>VOLVER</a><br/>";


?>
