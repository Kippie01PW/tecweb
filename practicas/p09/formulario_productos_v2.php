<!DOCTYPE html >
<html>

  <head>
    <meta charset="utf-8" >
    <title>Registrar productos</title>
    <style type="text/css">
      ol, ul { 
    list-style-type: none;
    }
    </style>
  </head>

  <body>
    <h1>Electrónicos y computos Kippie</h1>
    <h1>Sección de registro de productos</h1>

    <p>En esta sección se registran los nuevos productos que lleguen a la empresa</p>

    <form id="formularioProductos" action="http://localhost/tecweb/practicas/p09/set_producto_v2.php" method="post" onsubmit="return seleccionarMarca()">

    <h2>Información del Producto</h2>

      <fieldset>
        <legend>Ingresa la información del Producto</legend>

        <ul>
          <li><label for="form-name">Nombre del producto:</label> <input type="text" name="name" id="form-name" onfocus="limpiarMensajesRepuesta1()" onblur="verificarNombre()"><div id="respuesta1"></div></li>

            <li><p>Selecciona una marca:</p></li>
              <select name="brand" id="form-brand" size="1" onblur="seleccionarMarca()" onfocus="limpiarMensajeRespuesta2()">
                <option value="">Selecciona una opción</option>
                <option value="Apple">Apple</option>
                <option value="Samsung">Samsung</option>
                <option value="Microsoft">Microsoft</option>
                <option value="HP">HP</option>
                <option value="Dell">Dell</option>
                <option value="Lenovo">Lenovo</option>
                <option value="Nvidia">Nvidia</option>
                <option value="Intel">Intel</option>
                <option value="AMD">AMD</option>
              </select>
              <div id="respuesta2"></div>
  
          <li><label for="form-model">Modelo del producto:</label> <input type="text" name="model" id="form-model" onfocus="limpiarMensajesRepuesta3()" onblur="verificarModelo()"><div id="respuesta3"></div></li>
          <li><label for="form-price">Precio del producto:</label> <input type="text" name="price" id="form-price" onfocus="limpiarMensajesRepuesta4()" onblur="verificarPrecio()"><div id="respuesta4"></div></li>
          <li><label for="form-description">Escribe la descripción del producto</label><br><textarea name="description" rows="4" cols="60" id="form-description" placeholder="Escribe algo aquí..." onfocus="limpiarMensajesRepuesta5()" onblur="controlarCaracteres()"></textarea><div id="respuesta5"></div></li>
          <li><label for="form-unit">Unidades del producto:</label> <input type="text" name="unit" id="form-unit" onfocus="limpiarMensajesRepuesta6()" onblur="verificarUnidades()"><div id="respuesta6"></div></li>
          <li><label for="form-imagen">Opcionalmente pon una ruta de imagen:</label> <input type="text" name="imagen" id="form-imagen"></li>
        </ul>
      </fieldset>

      <p>
        <input type="submit" value="Subir producto">
        <input type="reset" onfocus="borrarTodo()">
      </p>

    </form>

    <script src="./index.js"></script>
  </body>
</html>