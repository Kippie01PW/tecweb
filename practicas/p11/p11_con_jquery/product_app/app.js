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
    console.log("Jquery está funcionando"); 

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
            }
        })
        
      }
    })

    $('#product-form').submit(function(e){
        const postData = {
            name: $('#name').val(),
            description: $('#description').val()
        }; 
        $.post('backend/product-add.php', postData, function(response){
        console.log(response); 
        }); 
        e.preventDefault(); 
    })
}); 
