// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}

//Comprobar que Jquery está funcionando
$(document).ready(function(){
    let edit = false; 
    console.log("Jquery está funcionando"); 
    $('#product-result').hide(); 
    fetchProducts(); 

    $('#search').keyup(function(e){
      if($('#search').val()){

        let search = $('#search').val();
        $.ajax({
            url: 'backend/product-search.php',
            type: 'POST',
            data: { search },
            success: function (response){
                console.log(response);  // Añade esto para ver la respuesta
                let product = JSON.parse(response); 
                let template = '';  
                product.forEach(product => {
                    template += `<li>
                        ${product.name}
                    </li>`
                });
                $('#container').html(template); 
                $('#product-result').show(); 
            }
        });
        
      }
    });

    init(); 

    $('#product-form').submit(function(e){
        if($('#name').val()!= ''){
            const postData = {
                name: $('#name').val(),
                description: $('#description').val(),
                id: $('#product-id').val()
            }; 
    
            let url = edit === false ? 'backend/product-add.php' : 'backend/product-edit.php'; 
    
            $.post(url, postData, function(response){
                fetchProducts(); 
            $('#product-form').trigger('reset'); 
            init ();
            alert(response); 
            }); 
            e.preventDefault(); 
        }else{
            alert('Por favor, verifica los campos'); 
        }
    }); 


    function fetchProducts(){
        $.ajax({
            url: 'backend/product-list.php',
            type: 'GET', 
            success: function(response){
                let product = JSON.parse(response); 
                let template = ''; 
                product.forEach(product => {
                    template += `
                        <tr product-id= "${product.id}">
                            <td>${product.id}</td>
                            <td><a href="#" class="product-item">${product.name}</a></td>
                            <td>${product.description}</td>

                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `
                });
                $('#products').html(template); 
            }
        })
    }

    $(document).on('click', '.product-delete', function(){
        if(confirm('Quieres eliminar este producto?')){
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('product-id'); 
            $.post('backend/product-delete.php', {id}, function(response){
                fetchProducts();  
        });
        }
    });

    $(document).on('click', '.product-item', function(){
        let element = $(this)[0].parentElement.parentElement; 
        let id = $(element).attr('product-id'); 
        $.post('backend/product-single.php', {id}, function(response){
            const product = JSON.parse(response); 
    
            const formattedDescription = JSON.stringify(JSON.parse(product.description), null, 2);
    
            $('#name').val(product.name); 
            $('#description').val(formattedDescription);
            $('#product-id').val(product.id); 
            edit = true; 
        }); 
        alert(response); 
    });
    
}); 
