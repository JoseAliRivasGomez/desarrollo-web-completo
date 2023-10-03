<?php

$db = mysqli_connect('mysql', 'root', 'myrootpassword', 'mysqldb', 3306);

if(!$db) {
    echo "Hubo un error";
    exit;
}