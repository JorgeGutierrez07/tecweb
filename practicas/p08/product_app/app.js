//Funcion para validar datos
function validar(finalJSON) {
  var nombre = finalJSON.nombre;
  var marca = finalJSON.marca;
  var modelo = finalJSON.modelo;
  var precio = finalJSON.precio;
  var detalles = finalJSON.detalles;
  var unidades = finalJSON.unidades;
  var imagen = finalJSON.imagen;

  var valida = true;

  var nom = /^[a-zA-Z0-9\s]+$/;
  var model = /^[-a-zA-Z\s]+$/;
  var mar = /^[-a-zA-Z\s]+$/;
  var prec = /^[0-9,.]+$/;
  var deta = /^[a-zA-Z0-9.%:,\s]+$/;
  var uni = /^[0-9\s]+$/;
  var img = /^[-a-zA-Z0-9./_\s]+$/;

  if (!nom.test(nombre) || nombre.length > 100) {
    alert("Nombre mal escrito o mayor a 100 caracteres");
    valida = false;
  } else if (!mar.test(marca)) {
    alert("Campo marca mal escrito o vacio");
    valida = false;
  } else if (!model.test(modelo) && modelo.length <= 25) {
    alert("Campo modelo mal escrito o sobrepasado");
    valida = false;
  } else if (!prec.test(precio) || parseFloat(precio) > 99.99) {
    alert("Campo precio mal escrito");
    valida = false;
  } else if (!deta.test(detalles) || detalles.length > 250) {
    alert(
      "Campo de detalles con error, mal escrito o caracteres superior a 250"
    );
    valida = false;
  } else if (!uni.test(unidades)) {
    alert("Unidades mal escritas");
    valida = false;
  } else if (!img.test(imagen)) {
    alert("Ruta de imagen mal escrita");
    valida = false;
  }
  return valida;
}
// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  precio: 0.0,
  unidades: 1,
  modelo: "XX",
  marca: "NA",
  detalles: "NA",
  imagen: "img/default.png",
};

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
  /**
   * Revisar la siguiente información para entender porqué usar event.preventDefault();
   * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
   * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
   */
  e.preventDefault();

  // SE OBTIENE EL ID A BUSCAR
  var id = document.getElementById("search").value;

  // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
  var client = getXMLHttpRequest();
  client.open("POST", "./backend/read.php", true);
  client.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  client.onreadystatechange = function () {
    // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
    if (client.readyState == 4 && client.status == 200) {
      console.log("[CLIENTE]\n" + client.responseText);
      // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
      let productos = JSON.parse(client.responseText); // similar a eval('('+client.responseText+')');
      // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
      if (Object.keys(productos).length > 0) {
        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
        let templates = "";

        productos.forEach((element) => {
          let descripcion = "";
          descripcion += "<li>precio: " + element.precio + "</li>";
          descripcion += "<li>unidades: " + element.unidades + "</li>";
          descripcion += "<li>modelo: " + element.modelo + "</li>";
          descripcion += "<li>marca: " + element.marca + "</li>";
          descripcion += "<li>detalles: " + element.detalles + "</li>";

          // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
          let template = "";
          template += `
                            <tr>
                                <td>${element.id}</td>
                                <td>${element.nombre}</td>
                                <td><ul>${descripcion}</ul></td>
                            </tr>
                        `;
          templates += template;
          // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
        });
        document.getElementById("productos").innerHTML = templates;
      }
    }
  };
  client.send("id=" + id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
  e.preventDefault();

  // SE OBTIENE DESDE EL FORMULARIO EL JSON A ENVIAR
  var productoJsonString = document.getElementById("description").value;
  // SE CONVIERTE EL JSON DE STRING A OBJETO
  var finalJSON = JSON.parse(productoJsonString);
  // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
  finalJSON["nombre"] = document.getElementById("name").value;
  // SE OBTIENE EL STRING DEL JSON FINAL
  if (validar(finalJSON)) {
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open("POST", "./backend/create.php", true);
    client.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
      // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
      if (client.readyState == 4 && client.status == 200) {
        console.log(client.responseText);
        let verificado = JSON.parse(client.responseText);
        
        alert(verificado.mensaje);
      }
    };
    client.send(productoJsonString);
  }
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
  var objetoAjax;

  try {
    objetoAjax = new XMLHttpRequest();
  } catch (err1) {
    /**
     * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
     *       pero se comparten por motivos historico-académicos.
     */
    try {
      // IE7 y IE8
      objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        // IE5 y IE6
        objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err3) {
        objetoAjax = false;
      }
    }
  }
  return objetoAjax;
}

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;
}
