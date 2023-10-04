<?php include 'includes/header.php';

$nombre = "Juan";
$_nombre = "Juan";

$nombre = "Juan 2";

echo $nombre;
echo "<br>";

var_dump($nombre);
echo "<br>";

define('constante', "Este es el valor de la constante");
echo constante;
echo "<br>";

const constante2 = "Hola 2";
echo constante2;
echo "<br>";

$nombreCliente = "Pedro";
$nombre_cliente = "Pedro";

include 'includes/footer.php';