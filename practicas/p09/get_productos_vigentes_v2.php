<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        img {
            width: auto;
            height: 100px;
        }
    </style>

        <script>
        function show(event) {
            var rowId = event.target.parentNode.parentNode.id;
            var data = document.getElementById(rowId).querySelectorAll(".row-data");

            var id = rowId;

            var name = data[0].innerHTML;
            var brand = data[1].innerHTML;
            var model = data[2].innerHTML;
            var price = data[3].innerHTML;
            var description = data[5].innerHTML;
            var unit = data[4].innerHTML;
            var imagen = data[6].querySelector('img').src;

            alert("ID: " + id + "\nNombre: " + name + "\nMarca: " + brand + "\nModelo: " + model + "\nPrecio: " + price + "\nUnidades: " + unit + "\nDetalles: " + description + "\nRuta de imagen: " + imagen);

            send2form(id, name, brand, model, price, description, unit, imagen);
        }
        </script>

</head>
<body>
    <h3>PRODUCTOS</h3>
    <p></p>

    <?php
        /** SE CREA EL OBJETO DE CONEXIÓN */
        @$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');

        /** Comprobar la conexión */
        if ($link->connect_errno) {
            die('Falló la conexión: ' . $link->connect_error . '<br />');
        }

        /** Crear una tabla que devuelve un conjunto de resultados */
        if ($result = $link->query("SELECT * FROM productos WHERE eliminado = 0")) {
            echo '<table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Detalles</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Eliminado</th>
                        <th scope="col">Modificar</th>
                        </tr>
                    </thead>
                    <tbody>';

            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo '<tr id="' . $row['id'] . '">
                        <th scope="row">' . $row['id'] . '</th>
                        <td class="row-data">' . $row['nombre'] . '</td>
                        <td class="row-data">' . $row['marca'] . '</td>
                        <td class="row-data">' . $row['modelo'] . '</td>
                        <td class="row-data">' . $row['precio'] . '</td>
                        <td class="row-data">' . $row['unidades'] . '</td>
                        <td class="row-data">' . $row['detalles'] . '</td>
                        <td class="row-data"><img src="' . $row['imagen'] . '" alt="Imagen del producto" /></td>
                        <td>' . $row['eliminado'] . '</td>
                        <td><input type="button" value="modificar" onclick="show(event)" /></td>
                        </tr>';
            }
                    

            echo '</tbody></table>';

            /** útil para liberar memoria asociada a un resultado con demasiada información */
            $result->free();
        } else {
            echo 'No hay productos con esa cantidad de unidades.';
        }

        $link->close();
    
    ?>
        <script>
        function send2form(id, name, brand, model, price, description, unit, imagen) {
            var form = document.createElement("form");

            var idIn = document.createElement("input");
            idIn.type = 'hidden';
            idIn.name = 'id';
            idIn.value = id;
            form.appendChild(idIn);

            var nameIn = document.createElement("input");
            nameIn.type = 'text';
            nameIn.name = 'name';
            nameIn.value = name;
            form.appendChild(nameIn);

            var modelIn = document.createElement("input");
            modelIn.type = 'text';
            modelIn.name = 'model';
            modelIn.value = model;
            form.appendChild(modelIn);

            var priceIn = document.createElement("input");
            priceIn.type = 'text';
            priceIn.name = 'price';
            priceIn.value = price;
            form.appendChild(priceIn);

            var descriptionTextarea = document.createElement("textarea");
            descriptionTextarea.name = 'description';
            descriptionTextarea.rows = 4; 
            descriptionTextarea.cols = 60; 
            descriptionTextarea.value = description; 
            form.appendChild(descriptionTextarea);

            var unitIn = document.createElement("input");
            unitIn.type = 'text';
            unitIn.name = 'unit';
            unitIn.value = unit;
            form.appendChild(unitIn);

            var imagenIn = document.createElement("input");
            imagenIn.type = 'text';
            imagenIn.name = 'imagen';
            imagenIn.value = imagen;
            form.appendChild(imagenIn);
            console.log(form);

            form.method = 'POST';
            form.action = 'formulario_productos_v2.php';  

            document.body.appendChild(form);
            form.submit();
        }
    </script>

    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>
</body>
</html>

