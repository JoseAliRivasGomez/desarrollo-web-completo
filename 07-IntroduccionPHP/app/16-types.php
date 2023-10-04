<?php 
declare(strict_types=1);
include 'includes/header.php';

function usuarioAutenticado(bool $autenticado) : ?string { //* or string|int
    if($autenticado) {
        return "El Usuario esta autenticado";
    } else {
        return null;
    }
}

$usuario = usuarioAutenticado(false);
echo $usuario;

include 'includes/footer.php';