var form = document.getElementById('formularioProductos'); 
var mensaje1 = ''; 
var mensaje2 = ''; 
var mensaje3 = ''; 
var mensaje4 = ''; 
var mensaje5 = ''; 
var mensaje6 = ''; 
var mensaje7 = ''; 
var mensaje9 = '';
var mensaje10 = '';  

function verificarNombre() {
    let entrada = document.getElementById("form-name").value;
    let sinErrores = true;
    mensaje1 = ""; 
    mensaje2 = ""; 

    if(entrada.trim() === ""|| entrada.length > 100) {
        if(entrada.trim() === ""){
            mensaje1 = "El campo no debe de estar vacío, por favor, coloca un nombre."; 
            sinErrores = false;
        }
        if(entrada.length > 100){
            mensaje2 = "El nombre no puede exceder de los 100 caracteres."; 
            sinErrores = false; 
        }
    }
    document.getElementById("respuesta1").innerText = mensaje1 + " " + mensaje2; 
    return sinErrores; 
}

function limpiarMensajesRepuesta1() {
    document.getElementById("respuesta1").innerText = ""; 
}

function seleccionarMarca(){
    let brand = document.getElementById('form-brand').value;
    let sinErrores = true; 
    mensaje3 = ""; 

    if (brand.trim() === "") {
        mensaje3 = "Selecciona una marca para el producto."; 
        sinErrores = false; 
    }
    document.getElementById("respuesta2").innerText = mensaje3; 
    return sinErrores; 
}

function limpiarMensajeRespuesta2() {
    let brand = document.getElementById('form-brand').value;
    if(brand != "")
    document.getElementById("respuesta2").innerText = "";
}

function verificarModelo() {
    let entrada = document.getElementById("form-model").value; 
    let sinErrores = true; 
    mensaje4 = ""; 
    mensaje5 = ""; 

    if(entrada.trim() === "" || entrada.length > 25) {
        if(entrada.trim() === ""){
            mensaje4 = "El campo no debe de estar vacío, por favor, coloca un modelo.";
            sinErrores = false; 
        }
        if(entrada.length > 50) {
            mensaje5 = "El modelo no debe de exceder de los 25 caracteres."; 
            sinErrores = false; 
        }
    }
    document.getElementById("respuesta3").innerText = mensaje4 + " " + mensaje5; 
    return sinErrores; 
}

function limpiarMensajesRepuesta3() {
    document.getElementById("respuesta3").innerText = ""; 
}

function verificarPrecio(){
    let entrada = document.getElementById("form-price").value; 
    let sinErrores = true; 
    mensaje6 = "";
    mensaje7 = "";
        if(entrada.trim()=== ""){
            mensaje6 = "El campo no debe de estar vacío, por favor, coloca precio al producto."; 
            sinErrores = false; 
            entrada = 100; 
        }
        if(entrada < 99.99){
            mensaje7 = "Toma en cuenta que vendemos productos arriba de 99.99 pesos"; 
            sinErrores = false; 
        } 
        document.getElementById("respuesta4").innerText = mensaje6 + " " + mensaje7;
    
    return sinErrores; 
}

function limpiarMensajesRepuesta4() {
    document.getElementById("respuesta4").innerText = ""; 
}

function controlarCaracteres() {
    let entrada = document.getElementById("form-description").value; 
    let sinErrores = true; 
    mensaje8 = "";

    if(entrada.length > 250){
        mensaje7 = "No se puede exceder de más de 250 caracteres."; 
        sinErrores = false; 
    }
    document.getElementById("respuesta5").innerText = mensaje8;
    return sinErrores; 
}

function limpiarMensajesRepuesta5() {
    document.getElementById("respuesta5").innerText = "";
}

function verificarUnidades(){
    let entrada = document.getElementById("form-unit").value; 
    let sinErrores = true; 
    mensaje9 = "";
        if(entrada.trim()=== ""){
            mensaje9 = "El campo no debe de estar vacío, por favor, coloca una unidad como mínimo."; 
            sinErrores = false;  
        }
        document.getElementById("respuesta6").innerText = mensaje9;
    return sinErrores; 
}


function limpiarMensajesRepuesta6() {
    document.getElementById("respuesta6").innerText = "";
}

function rutaPredeterminadaImagen(){
    let entrada = document.getElementById("form-imagen").value;
    if(entrada.trim()===""){
        entrada = "http://localhost/tecweb/practicas/p09/src/imagen.png"
        document.getElementById("form-imagen").value = entrada;
    }
}

function borrarTodo() {
    document.getElementById('formularioTenis'); 
    limpiarMensajesRepuesta1(); 
    limpiarMensajesRepuesta2(); 
    limpiarMensajesRepuesta3(); 
    limpiarMensajesRepuesta4(); 
    limpiarMensajesRepuesta5(); 
    limpiarMensajeRespuesta6(); 
}
form.addEventListener('submit', function(event) {
    event.preventDefault();
    let hayErrores = false;

    if( !verificarNombre() ) {
        let div1 = document.getElementById("respuesta1");
        div1.innerHTML = '<span>'+mensaje1 + " " + mensaje2+'</span>';
        hayErrores = true;
    }

    if( !verificarModelo() ) {
        let div2 = document.getElementById("respuesta3"); 
        div2.innerHTML = '<span>'+mensaje4 + " " + mensaje5+'</span>'; 
        hayErrores = true; 
    }

    if( !verificarPrecio() ) {
        let div3 = document.getElementById("respuesta4"); 
        div3.innerHTML = '<span>'+mensaje6 + " " + mensaje7+'</span>';
        hayErrores = true; 
    }

    if( !controlarCaracteres() ) {
        let div4 = document.getElementById("respuesta5"); 
        div4.innerHTML = '<span>'+mensaje8+'</span>';
        hayErrores = true; 
    }

    if( !seleccionarMarca() ){
        let div5 = document.getElementById("respuesta2"); 
        div5.innerHTML = '<span>'+mensaje3+'</span>';
        hayErrores = true; 
    }

    if( !verificarUnidades() ){
        let div6 = document.getElementById("respuesta6"); 
        div6.innerHTML = '<span>'+mensaje9+'</span>';
        hayErrores = true; 
    }

    if( !hayErrores ) {
        this.submit();
    }
});