<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {

        error_reporting(E_ERROR | E_WARNING); // Desactiva notificaciones de nivel E_NOTICE
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $auth = $_SESSION['login'] ?? null;
        $rutas_protegidas = [];

        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';  //! PATH_INFO or REQUEST_URI
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            // $currentUrl = explode('?', $currentUrl)[0]; //! IMPORTANTE
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if(in_array($currentUrl, $rutas_protegidas) && !$auth){
            header('Location: /');
            exit; // Detiene la ejecución del script
        }

        if ( $fn ) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            http_response_code(404); // Establece el código de respuesta HTTP a 404
            echo "Página No Encontrada";
            exit;
        }
    }

    public function render($view, $datos = []) {
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}
