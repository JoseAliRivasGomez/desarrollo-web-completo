<?php

$db = mysqli_connect('mysql', 'root', 'myrootpassword', 'mysqldb', 3306);

if(!$db) {
    echo "Hubo un error";
    exit;
}

//* Consultas necesarias para crear la tabla e insertar los datos
// create table servicios (
// 	id int(11) not null auto_increment,
//     nombre varchar(60) not null,
//     precio decimal(8,2) not null,
//     primary key (id)
//     );

// INSERT INTO servicios ( nombre, precio ) VALUES
//     ('Corte de Cabello Niño', 60),
//     ('Corte de Cabello Hombre', 80),
//     ('Corte de Barba', 60),
//     ('Peinado Mujer', 80),
//     ('Peinado Hombre', 60),
//     ('Tinte',300),
//     ('Uñas', 400),
//     ('Lavado de Cabello', 50),
//     ('Tratamiento Capilar', 150);