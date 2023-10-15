<?php

namespace Controllers;

use Exception;
use Model\Regalo;
use Model\Registro;

class APIRegalos {

    public static function index() {

        if(!is_admin()) {
            echo json_encode([]);
            return;
        }

        $regalos = Regalo::all();

        foreach ($regalos as $regalo) {
            $criteria = ['regalo_id' => $regalo->id, 'paquete_id' => "1"];
            
            // Intenta obtener el total, maneja cualquier excepción que pueda ocurrir
            try {
                $total = Registro::totalArray($criteria);
            } catch (Exception $e) {
                // En caso de excepción, establece el total en 0
                $total = 0;
            }
        
            // Asigna el total
            $regalo->total = $total;
        }
        

        echo json_encode($regalos);
        
        return;
        
    }
}