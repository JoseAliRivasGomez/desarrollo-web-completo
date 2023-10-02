"use strict"; //* Correr JS en modo estricto

const producto = {
    nombreProducto : "Monitor 20 Pulgadas",
    precio: 300,
    disponible: true
}

Object.seal(producto); //* .freeze .seal

producto.precio = 'NUEVO PRECIO'; //* Yes

producto.imagen = 'imagen.jpg'; //! Nope

delete producto.precio; //! Nope

console.log(producto);
console.log(Object.isSealed(producto));