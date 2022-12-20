<?php


if(isset($_COOKIE['idioma'])){
    echo "Erase una vez <br>\n";
}else{
    echo "There was upon a time <br>\n";
    setcookie('idioma','es',time()+60);
}

















?>