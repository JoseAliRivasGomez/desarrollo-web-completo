//* Array Methods

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'];

const carrito = [
    { nombre: 'Monitor 20 Pulgadas', precio: 500 },
    { nombre: 'Televisión 50 Pulgadas', precio: 700 },
    { nombre: 'Tablet', precio: 300 },
    { nombre: 'Audifonos', precio: 200 },
    { nombre: 'Teclado', precio: 50 },
    { nombre: 'Celular', precio: 500},
    { nombre: 'Bocinas', precio: 300},
    { nombre: 'Laptop', precio: 800}
];

//* forEach
meses.forEach(function(mes) {
    if(mes == 'Marzo') {
        console.log('Marzo si existe');
    }
});

//* Includes, devuelve boolean
let resultado = meses.includes('Diciembre');

//* Some ideal para arreglo de objetos, devuelve boolean
resultado = carrito.some(function(producto) {
    return producto.nombre === 'Celular PRO'
})

//* Reduce, suma el total de precios
resultado = carrito.reduce(function(total, producto) {
    return total + producto.precio
}, 0); //* Inicia en 0

//* Find, devuelve el primero que cumple la condicion
resultado = carrito.find(function(producto) {
    return producto.nombre === 'Celular'
});

//* Filter, devuelve todos los que cumplen la condicion
resultado = carrito.filter(function(producto) {
    return producto.nombre !== 'Celular'
});
resultado = carrito.filter(producto => producto.precio > 400);

console.log(resultado);
