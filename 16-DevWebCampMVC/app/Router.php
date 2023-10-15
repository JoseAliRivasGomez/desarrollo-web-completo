<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {

        error_reporting(E_ERROR | E_WARNING); // Desactiva notificaciones de nivel E_NOTICE
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $auth = $_SESSION['login'] ?? null;
        $rutas_protegidas = [];

        $url_actual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';  //! PATH_INFO or REQUEST_URI
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$url_actual] ?? null;
        } else {
            $fn = $this->postRoutes[$url_actual] ?? null;
        }

        if(in_array($url_actual, $rutas_protegidas) && !$auth){
            header('Location: /');
            exit; // Detiene la ejecución del script
        }

        if ( $fn ) {
            call_user_func($fn, $this);
        } else {
            header('Location: /404');
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value; 
        }

        ob_start(); 

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // Limpia el Buffer

        // Utilizar el Layout de acuerdo a la URL
        $url_actual = $_SERVER['REQUEST_URI'] ?? '/'; //! PATH_INFO or REQUEST_URI

        if(str_contains($url_actual, '/admin')) {
            include_once __DIR__ . '/views/admin-layout.php';
        } else {
            include_once __DIR__ . '/views/layout.php';
        }

        
    }
}
