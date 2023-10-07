<?php 

function conectarDB() : mysqli {
    $db = mysqli_connect('mysql', 'root', 'myrootpassword', 'bienesraicesdb');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}