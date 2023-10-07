<?php 

function conectarDB() : mysqli {
    $db = new mysqli('mysql', 'root', 'myrootpassword', 'bienesraicesdb');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
    
}