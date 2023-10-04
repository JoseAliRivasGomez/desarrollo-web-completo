<?php 
declare(strict_types=1); //* Muestra errores en el codigo
include 'includes/header.php';

function sumar(int $numero1 = 0, int $numero2 = 0 ) {
    echo $numero1 + $numero2;
}

sumar(10, 5);
echo "<br>";
sumar(numero2: 10, numero1: 5);

include 'includes/footer.php';