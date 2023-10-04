<?php

function obtener_servicios() {
    try {
        //* Importar las credenciales
        require 'database.php';

        //* Consulta SQL
        $sql = "SELECT * FROM servicios;";

        //* Realizar la consulta
        $consulta = mysqli_query($db, $sql);

        //* Mostrar resultados
        // echo "<pre>";
        // var_dump(mysqli_fetch_all($consulta));
        // echo "</pre>";

        //* Cerrar la conexion (opcional porque PHP las cierra automaticamente)
        // $resultado = mysqli_close($db);
        // echo $resultado;

        //* Retornar resultados
        return $consulta;

    } catch (\Throwable $th) {
        var_dump($th);
    }
}

// obtener_servicios();
