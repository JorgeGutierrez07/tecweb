// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  precio: 0.0,
  unidades: 1,
  modelo: "XX-000",
  marca: "NA",
  detalles: "NA",
  imagen: "img/default.png",
};

function init() {
  /**
   * Convierte el JSON a string para poder mostrarlo
   * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
   */
  var JsonString = JSON.stringify(baseJSON, null, 2);
  document.getElementById("description").value = JsonString;

  // SE LISTAN TODOS LOS PRODUCTOS
}

$(document).ready(function () {
  let edit = false;
  fetchProducts();
  $("#search").keyup(function (e) {
    if ($("#search").val()) {
      let search = $("#search").val();

      $.ajax({
        url: "http://localhost:3000/practicas/p09/p09_con_jquery/product_app/backend/product_search.php",
        type: "GET",
        data: { search },
        success: function (response) {
          let productos = JSON.parse(response);
          let template = "";
          productos.forEach((producto) => {
            template += `
                <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td>
                                    <a href="#" class="product-item">${producto.nombre}</a>
                                </td>
                                <td>${producto.marca}</td>
                                <td>${producto.modelo}</td>
                                <td>$${producto.precio}</td>
                                <td>${producto.detalles}</td>
                                <td>${producto.unidades}</td>
                                <td>
                                </tr>
                                `;
          });

          $("#products").html(template);
          $("#product-result").show();
        },
      });
    }
  });

  $("#product-form").submit(function (e) {
    var finalJSON = JSON.parse($("#description").val());
    const postData = {
      nombre: $("#name").val(),
      precio: finalJSON["precio"],
      unidades: finalJSON["unidades"],
      modelo: finalJSON["modelo"],
      marca: finalJSON["marca"],
      detalles: finalJSON["detalles"],
      imagen: finalJSON["imagen"],
      id: $('#productId').val()
    };

    console.log(postData);
    productoJsonString = JSON.stringify(postData, null, 2);
    let url = edit === false ? 'http://localhost:3000/practicas/p09/p09_con_jquery/product_app/backend/product-add.php' : 'http://localhost:3000/practicas/p09/p09_con_jquery/product_app/backend/product-edit.php';
   console.log(url);
    $.post(
      url,
      productoJsonString,
      function (response) {
        fetchProducts();
        console.log(response);
        $("#product-form").trigger("reset");
        let respuesta = JSON.parse(response);
        let template_bar = "";
        template_bar += `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>`;
        $("#product-result").attr("class", "card my-4 d-block");
        $("#container").html(template_bar);
      }
    );
    e.preventDefault();
  });

  function fetchProducts() {
    $.ajax({
      url: "backend/product-list.php",
      type: "post",
      success: function (response) {
        let prods = JSON.parse(response);
        let template = "";

        prods.forEach((prod) => {
          template += `
                <tr productId="${prod.id}">
                <td>${prod.id}</td>
                <td>
                    <a href="#" class="product-item">${prod.nombre}</a>
                </td>
                <td>${prod.marca}</td>
                <td>${prod.modelo}</td>
                <td>${prod.precio}</td>
                <td>${prod.detalles}</td>
                <td>${prod.unidades}</td>
                <td>
                    <button class="product-delete btn btn-danger">
                        Eliminar
                    </button>
                </td>
            </tr>
                `;
        });
        $("#products").html(template);
      },
    });
  }
  $(document).on("click", ".product-delete", function () {
    if (confirm("¿Quieres eliminar el producto?")) {
      const element = $(this)[0].parentElement.parentElement;
      const id = $(element).attr("productId");
      $.get("backend/product-delete.php", { id }, function (response) {
        let respuesta = JSON.parse(response);
        console.log(respuesta);
        fetchProducts();
        let mensaje = respuesta.message;
        alert(mensaje);
      });
    }
  });
  $(document).on("click", ".product-item", function () {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr("productId");
    $.post(
      "http://localhost:3000/practicas/p09/p09_con_jquery/product_app/backend/product-single.php",
      { id },
      function (response) {
        const producto = JSON.parse(response);
        $("#name").val(producto.nombre);
        $("productId").val(producto.id);
        var editaJSON = {
          precio: producto.precio,
          unidades: producto.unidades,
          marca: producto.marca,
          modelo: producto.modelo,
          detalles: producto.detalles,
          unidades: producto.unidades,
          imagen: producto.imagen,
        };
        $("#description").val((editaJSON = JSON.stringify(editaJSON, null, 2)));
        $('#productId').val(producto.id);
        edit = true;
      }
    );
  });
});
