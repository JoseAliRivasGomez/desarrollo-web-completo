
//* Declaración de Función
sumar();
function sumar() {
    console.log(10 + 10);
}



//* Expresión de la función
sumar2(); //! Nope, no ha sido creada
const sumar2 = function() {
    console.log( 3 + 3);
}


(function() {
    console.log('Funcion anonima autoinvocada');
})();