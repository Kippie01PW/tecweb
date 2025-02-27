var form = document.getElementById('formularioProductos'); 
var mensaje1 = ''; 
var mensaje2 = ''; 
var mensaje3 = ''; 
var mensaje4 = ''; 
var mensaje5 = ''; 
var mensaje6 = ''; 
var mensaje7 = ''; 
var mensaje9 = ''; 

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
    mensaje9 = ""; 

    if (brand === "0") {
        mensaje9 = "Selecciona una marca para el producto."; 
        sinErrores = false; 
    }
    document.getElementById("respuesta6").innerText = mensaje9; 
    return sinErrores; 
}

function limpiarMensajeRespuesta6() {
    let brand = document.getElementById('form-brand').value;
    if(brand != "")
    document.getElementById("respuesta6").innerText = "";
}

function verificarModelo() {
    let entrada = document.getElementById("form-model").value; 
    let sinErrores = true; 
    mensaje3 = ""; 
    mensaje4 = ""; 

    if(entrada.trim() === "" || entrada.length > 25) {
        if(entrada.trim() === ""){
            mensaje3 = "El campo no debe de estar vacío, por favor, coloca un modelo.";
            sinErrores = false; 
        }
        if(entrada.length > 50) {
            mensaje4 = "El modelo no debe de exceder de los 25 caracteres."; 
            sinErrores = false; 
        }
    }
    document.getElementById("respuesta2").innerText = mensaje3 + " " + mensaje4; 
    return sinErrores; 
}

function limpiarMensajesRepuesta2() {
    document.getElementById("respuesta2").innerText = ""; 
}

function verificarPrecio(){
    let entrada = document.getElementById("form-price").value; 
    let sinErrores = true; 
    mensaje5 = "";
    mensaje6 = "";
        if(entrada.trim()=== ""){
            mensaje5 = "El campo no debe de estar vacío, por favor, coloca precio al producto."; 
            sinErrores = false; 
            entrada = 100; 
        }
        if(entrada < 99.99){
            mensaje6 = "Toma en cuenta que vendemos productos arriba de 99.99 pesos"; 
            sinErrores = false; 
        } 
        document.getElementById("respuesta3").innerText = mensaje5 + " " + mensaje6;
    
    return sinErrores; 
}

function limpiarMensajesRepuesta3() {
    document.getElementById("respuesta3").innerText = ""; 
}

function controlarCaracteres() {
    let entrada = document.getElementById("form-story").value; 
    let sinErrores = true; 
    mensaje7 = "";

    if(entrada.length > 250){
        mensaje7 = "No se puede exceder de más de 250 caracteres."; 
        sinErrores = false; 
    }
    document.getElementById("respuesta4").innerText = mensaje7;
    return sinErrores; 
}

function limpiarMensajesRepuesta4() {
    document.getElementById("respuesta4").innerText = "";
}

document.addEventListener("DOMContentLoaded", function() {
    //Con esto logramos que por default esté seleccionado el color negro
    document.getElementById("color3").checked = true;
});



function borrarTodo() {
    document.getElementById('formularioTenis'); 
    limpiarMensajesRepuesta1(); 
    limpiarMensajesRepuesta2(); 
    limpiarMensajesRepuesta3(); 
    limpiarMensajesRepuesta4(); 
    limpiarMensajeRespuesta6(); 
}
form.addEventListener('submit', function(event) {
    event.preventDefault();
    let hayErrores = false;

    if( !verificarNombre() ) {
        let div1 = document.getElementById("respuesta1");
        div1.innerHTML = '<span>'+mensaje1+'</span>';
        hayErrores = true;
    }

    if( !verificarModelo() ) {
        let div2 = document.getElementById("respuesta2"); 
        div2.innerHTML = '<span>'+mensaje3 + " " + mensaje4+'</span>'; 
        hayErrores = true; 
    }

    if( !verificarPrecio() ) {
        let div3 = document.getElementById("respuesta3"); 
        div3.innerHTML = '<span>'+mensaje5+'</span>';
        hayErrores = true; 
    }

    if( !controlarCaracteres() ) {
        let div4 = document.getElementById("respuesta4"); 
        div4.innerHTML = '<span>'+mensaje7+'</span>';
        hayErrores = true; 
    }

    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    let alMenosUnoSeleccionado = false;
    let mensaje8 = "Selecciona al menos una opción.";

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            alMenosUnoSeleccionado = true;
        }
    });

    if (!alMenosUnoSeleccionado) {
        document.getElementById("respuesta5").innerText = mensaje8;
        hayErrores = true; 
    } else {
        document.getElementById("respuesta5").innerText = "";
    }

    if( !seleccionarMarca() ){
        let div5 = document.getElementById("respuesta6"); 
        div5.innerHTML = '<span>'+mensaje9+'</span>';
        hayErrores = true; 
    }

    if( !hayErrores ) {
        this.submit();
    }
});