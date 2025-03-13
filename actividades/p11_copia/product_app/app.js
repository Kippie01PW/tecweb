/**
 * SE ELIMINARON LA INICIALIZACIÓN DE LA VARIABLE JSON Y EL MÉTODO INIT, YA NO SON NECESARIOS PUESTO QUE
 * CADA VARIABLE TIENE SU INPUT PROPIO
 */
$(document).ready(function(){
    let edit = false;

    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    
                    let template = '';

                    productos.forEach(producto => {
                        
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        
                        const productos = JSON.parse(response);
                        if(Object.keys(productos).length > 0) {
                            
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
        
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;
                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            $('#product-result').show();
                            $('#container').html(template_bar);
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    /**
     * 
     * EN ESTA PARTE DEL CÓDIGO DONDE MÁS SE REALIZARON CAMBIOS
     */
    let validacion = false; 
    //Validación de datos
    /**
     * SE DEFINE UNA VARIABLE DEL TIPO BOOLEAN PARA LLEVAR EL CONTROL SOBRE 
     * EL FORMULARIO PARA QUE NO SE ENVÍE CON DATOS INCORRECTOS
     */

    /**
     * 
     * LOS SIGUIENTES MÉTODOS LOS INVESTIGÉ Y CAMBIE POR LOS DE LA PRÁCTICA 09
     * POR CUESTIONES DE APRENDIZAJE DECIDÍ UTILIZAR LAS HERRAMIENTAS Y FACILIDADES
     * QUE NOS DA JQUERY PARA ESTAR MÁS FAMILIARIZADO CON ESTE API
     */
    $('#name').on('blur', function() {
        var nameValue = $(this).val();
        if (!nameValue) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "nombre" no debe estar vacío.</li>');
            /**
             * 
             * NOS DAMOS CUENTA QUE AL FINAL DE UNA VALIDACIÓN SE LE ASIGNA A LA VARIABLE VALIDACION UN TRUE O FALSE
             * PARA EL CONTROL DE ENVÍO DE FORMULARIO 
             */
            validacion = false; 
        } else if (nameValue.length > 100) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "nombre" no debe superar los 100 caracteres.</li>');
            validacion = false;
        } else {
            /**
             * SE REALIZA ESTA PETICIÓN ASÍNCRONA AL SERVIDOR MEDIANTE AJAX PARA QUE MIENTRAS EL 
             * USUARIO ESCRIBA EL NOMBRE DE UN PRODUCTO A AGREGAR SE VERIFIQUE QUE ESTE PRODCTO NO ESTÉ DADO DE ALTA 
             */
            $.ajax({
                /**
                 * PARA REALIZAR ESTO EN ESPECÍFICO SE CREÓ UN NUEVO PHP QUE MEDIANTE UNA CONSULTA REVISA
                 * QUE LA VARIABLE NAMEVALUE NO TENGA EL MISMO DATO DE UN PRODUCTO YA DADO DE ALTA EN LA 
                 * BASE DE DATOS 
                 */
                url: './backend/product-data.php', //ESTE ARCHIVO FUE EL NUEVO QUE SE AÑADIÓ 
                type: 'GET',
                data: { search: nameValue },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.length > 0) {
                        $('#product-result').show();
                        $('#container').html('<li style="color: white;">Ya existe un producto con ese nombre.</li>');
                        validacion = false;
                    } else {
                        $('#container').html('');
                        $('#product-result').hide();
                        validacion = true;
                    }
                }
            });
        }
    });
    
    

    $('#model').on('blur', function() {
        var modelValue = $(this).val();
        if (!modelValue) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "modelo" no debe estar vacío.</li>');
            validacion = false; 
        } else if (modelValue.length > 25) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "modelo" no debe superar los 25 caracteres.</li>');
            validacion = false; 
        } else {
            $('#container').html('');
            $('#product-result').hide();
            validacion = true; 
        }
    });

    $('#unit').on('blur', function() {
        var unitValue = $(this).val();
        if (!unitValue) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "unidades" no debe estar vacío, coloca un 0 si no hay disponibilidad.</li>');
            validacion = false; 
        } else {
            $('#container').html('');
            $('#product-result').hide();
            validacion = true; 
        }
    });

    $('#cost').on('blur', function() {
        var costValue = $(this).val();
        if (!costValue) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo "Precio" no debe estar vacío.</li>');
            validacion = false; 
        } else if (costValue < 100) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">Recuerda, el Precio debe ser mayor a 99.99.</li>');
           validacion = false; 
        } else {
            $('#container').html('');
            $('#product-result').hide();
            validacion = true; 
        }
    });

    $('#brand').on('blur', function() {
        var brandValue = $(this).val();
        if (!brandValue) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "Marca" no debe estar vacío.</li>');
            validacion = false
        } else if (brandValue.length > 25) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "Marca" no debe superar los 25 caracteres.</li>');
           validacion = false
        } else {
            $('#container').html('');
            $('#product-result').hide();
            validacion = true; 
        }
    });
    
    $('#image').on('blur', function() {
        var imageValue = $(this).val();
        if (!imageValue) {
            $(this).val('img/default.png');
        }
    });

    $('#description').on('blur', function() {
        var descripcionValue = $(this).val();
        if (!descripcionValue) {
            $(this).val('Descripción genérica');
        } else if (descripcionValue.length > 250) {
            $('#product-result').show();
            $('#container').html('<li style="color: white;">El campo de "Descripción" no debe superar los 250 caracteres.</li>');
            validacion = false; 
        } else {
            $('#container').html('');
            $('#product-result').hide();
            validacion = true;
        }
    });
    /**
     * PARA TODOS LOS ANTERIORES MÉTODOS, SE UTILIZAN CON EL EVENTO ON BLUR,
     * CON ESTO SE PUEDE SUSTITUIR EL COLOCAR A CADA INPUT EN EL INDEX.HTML 
     * LOS ON BLUR, AHORRANDO TIEMPO
     */
    ////////////FIN DE LA VALIDACIÓN///////////////////

        $('#product-form').submit(e => {
            e.preventDefault();
            /**
             * 
             * COLOCAMOS POR DEFAULT EL TEXTO DENTRO DEL BOTÓN, ESTO PARA CUANDO SE MODIFICA Y SE CAMBIA EL BOTÓN A MODIFICAR 
             * CUANDO SE CARGA DE NUEVO EL FORMULARIO VUELVA A SALIR AGREGAR PRODUCTO
             */
            $('button.btn-primary.btn-block.text-center').text("Agregar Producto");

            let postData = {};

            /**
             * AQUÍ ES DONDE VERIFICAMOS QUE TODO DEL FORMULARIO ESTE BIEN, SI LA VALIDACION ES VERDADERA
             * PODRÁ CONVERTIR LOS STRINGS A OBJETOS PARA SER TRATADOS POR EL SERVIDOR
             */
            if(validacion==false){
                alert('No se pudo enviar los datos, verifica que los campos sean llenados correctamente');
                /**
                 * IMPORTANTE ESTE RETURN YA QUE GRACIAS A ESTE NO SE ENVÍA NADA HASTA NO CUMPLIR CON LA CONDICIÓN
                 */
                return; 
            }
            /**
             * SE AGREGARON LOS POSTDATA DE LAS INPUT RESTANTES YA QUE SI RECORDAMOS
             * LOS DETALLES ESTABAN DENTRO DE UN JSON
             */

            postData['nombre'] = $('#name').val();
            postData['id'] = $('#productId').val();
            postData['precio'] = $('#cost').val(); 
            postData['unidades'] = $('#unit').val(); 
            postData['modelo'] = $('#model').val(); 
            postData['marca'] = $('#brand').val();
            postData['detalles'] = $('#description').val();  
            postData['imagen'] = $('#image').val(); 
            const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
            
            $.post(url, postData, (response) => {
                console.log(response);
                let respuesta = JSON.parse(response);
                let template_bar = '';
                template_bar += `
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        `;
                // SE REINICIA EL FORMULARIO CON TODOS LOS VALORES DE LA VARIABLE
                $('#name').val('');
                $('#productId').val('');
                $('#cost').val(''); 
                $('#unit').val(''); 
                $('#model').val(''); 
                $('#brand').val('');
                $('#description').val('');  
                $('#image').val('');
                // SE HACE VISIBLE LA BARRA DE ESTADO
                $('#product-result').show();
                // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                $('#container').html(template_bar);
                // SE LISTAN TODOS LOS PRODUCTOS
                listarProductos();
                // SE REGRESA LA BANDERA DE EDICIÓN A false
                edit = false;
            });
        });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });



    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        /**
         * CON ESTA LINEA DE CÓDIGO AL SUCEDER EL EVENTO ON CLIC CAMBIAMOS EL 
         * TEXTO DEL BOTÓN POR MODIFICAR TEXTO 
         */
        $('button.btn-primary.btn-block.text-center').text("Modificar Producto");

        $.post('./backend/product-single.php', {id}, (response) => {
            let product = JSON.parse(response);
            $('#name').val(product.nombre);
            $('#cost').val(product.precio); 
            $('#unit').val(product.unidades); 
            $('#model').val(product.modelo); 
            $('#brand').val(product.marca);
            $('#description').val(product.detalles);  
            $('#image').val(product.imagen); 
            $('#productId').val(product.id); 
            edit = true;
        });
        e.preventDefault();
    });    
});