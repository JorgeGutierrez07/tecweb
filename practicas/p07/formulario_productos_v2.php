<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario de actualización de produtocs</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <style type="text/css">
      ol,
      ul {
        list-style-type: none;
        font-family: Arial, Helvetica, sans-serif;
      }
      /* Estilo para filas (<tr>) */
      tr {
        background-color: #f2f2f2; /* Color de fondo para las filas */
      }

      /* Estilo para celdas (<td>) */
      td {
        padding: 10px; /* Espaciado interno de las celdas */
        border: 1px solid #ccc; /* Borde de las celdas */
      }
    </style>
  </head>
  <body>
    <form id="formularioProducto" action="http://localhost/tecweb/practicas/p07/set_producto_v2.php" method="POST" onsubmit="return validar()">
      <fieldset>
        <legend>Incersion de datos para la tabla productos</legend>
        <ul>
          <li>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required value="<?= !empty($_POST['nombre'])?$_POST['nombre']:$_GET['nombre'] ?>"/>
          </li>
          <br />
          <li>
            <label for="marca"> Marca
              <br>
              <select id="marca" name="marca" required>
                <option value="nike">Playera Nike</option>
                <option value="adidas">Playera Adidas</option>
                <option value="levis">Playera Levis</option>
                <option value="aero">Playera Aero</option>
            </select>
            </label>
           
          </li>
          <br />

          <li>
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo"required value="<?= !empty($_POST['modelo'])?$_POST['modelo']:$_GET['modelo'] ?>" />
          </li>
          <br />

          <li>
            <label for="precio">Precio:</label>
            <input type="float" name="precio" id="precio" min="0" required value= "<?= !empty($_POST['precio'])?$_POST['precio']:$_GET['precio'] ?>"/>
          </li>
          <br />
          <li>
            <label for="detalles">Detalles:
            <br />
            <textarea
              name="detalles"
              rows="4"
              cols="60"
              id="detalles"
              placeholder="No más de 100 caracteres de longitud"
            ><?= !empty($_POST['detalles'])?$_POST['detalles']:$_GET['detalles'] ?></textarea></label>
            <br />
          </li>
          <br />
          <li>
            <label for="unidades">Unidades:</label>
            <input
              type="number"
              name="unidades"
              id="unidades"
              min="0"
              required
              value="<?= !empty($_POST['unidades'])?$_POST['unidades']:$_GET['unidades'] ?>"
            />
          </li>
          <br />
          <li>
            <legend>Inserta una imagen</legend>

            <label for="imagen">Imagen:</label>
            <input type="text" name="imagen" id="imagen" value="<?= !empty($_POST['imagen'])?$_POST['imagen']:$_GET['imagen'] ?>" />
          </li>
          <li>
            <input type="hidden" name="id" value="<?= !empty($_POST['id'])?$_POST['id']:$_GET['id'] ?>">
          </li>
        </ul>
        <input type="submit" value="Actualizar datos"/>
        <input type="reset" />
      </fieldset>
    </form>

    <script>
      function validar() {
        var nombre = document.getElementById("nombre").value;
        var marca = document.getElementById("marca").value;
        var modelo = document.getElementById("modelo").value;
        var precio = document.getElementById("precio").value;
        var detalles = document.getElementById("detalles").value;
        var unidades = document.getElementById("unidades").value;
        var imagen = document.getElementById("imagen").value;

        var validacion = true;

        var nom = /^[a-zA-Z0-9\s]+$/;
        var model = /^[-a-zA-Z\s]+$/;
        var prec = /^[0-9,.]+$/;
        var deta = /^[a-zA-Z0-9.%:,\s]+$/;
        var uni = /^[0-9\s]+$/;
        var img = /^[-a-zA-Z0-9./_\s]+$/;

        if (!nom.test(nombre) || nombre.length > 100) {
          alert("Nombre mal escrito o mayor a 100 caracteres");
          validacion = false;
        } else if (!model.test(modelo) && modelo.length <= 25) {
          alert("Campo modelo mal escrito o sobrepasado");
          validacion = false;
        } else if (!prec.test(precio) || parseFloat(precio) > 99.99) {
          alert("Campo precio mal escrito");
          validacion = false;
        } else if (!deta.test(detalles) || detalles.length > 250) {
          alert(
            "Campo de detalles con error, mal escrito o caracteres superior a 250"
          );
          validacion = false;
        } else if (!uni.test(unidades)) {
          alert("Unidades mal escritas");
          validacion = false;
        } else if (!img.test(imagen)) {
          alert("Ruta de imagen mal escrita");
          validacion = false;
        }
        return validacion;
      }
    </script>
  </body>
</html>
