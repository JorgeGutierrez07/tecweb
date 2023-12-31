$(document).ready(function () {
  let editar = false;
  let validado = false;
  let nombre_valido = false;
  let precio_valido = false;
  let unidades_valido = false;
  let modelo_valido = false;
  let marca_valido = false;
  let detalles_valido = false;
  let img_valido = false;

  fetchProducts();
  $("#search").keyup(function (e) {
    if ($("#search").val()) {
      let search = $("#search").val();

      $.ajax({
        url: "http://localhost:3000/practicas/p09Complemento/p09_con_jquery/product_app/backend/product_search.php",
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

  $("#name").blur(function () {
    var nombre_producto = $("#name").val();
    var patron_nombre = /^[a-zA-Z0-9\s]+$/;
    if (!patron_nombre.test(nombre_producto) || nombre_producto.lenght > 100) {
      $("#error_nombre").css("display", "block");
      nombre_valido = false;
    } else {
      $("#error_nombre").css("display", "none");
      nombre_valido = true;
    }
  });

  $("#marca").blur(function () {
    var marca_producto = $("#marca").val();
    var patron_marca = /^[a-zA-Z0-9\s]+$/;
    if (!patron_marca.test(marca_producto)) {
      $("#error_marca").css("display", "block");
      marca_valido = false;
    } else {
      $("#error_marca").css("display", "none");
      marca_valido = true;
    }
  });
  $("#modelo").blur(function () {
    var modelo_producto = $("#modelo").val();
    var patron_modelo = /^[a-zA-Z0-9]+$/;
    if (!patron_modelo.test(modelo_producto) || modelo_producto.lenght >= 25) {
      $("#error_modelo").css("display", "block");
      modelo_valido = false;
    } else {
      $("#error_modelo").css("display", "none");
      modelo_valido = true;
    }
  });


  $("#precio").blur(function () {
    var precio_producto = $("#precio").val();
    var patron_precio = /^[0-9.]+$/;
    if (
      !patron_precio.test(precio_producto) ||
      parseFloat(precio_producto) < 99.99
    ) {
      $("#error_precio").css("display", "block");
      precio_valido = false;
    } else {
      $("#error_precio").css("display", "none");
      precio_valido = true;
    }
  });

  $("#detalles").blur(function () {
    var detalles_producto = $("#detalles").val();
    var patron_detalles = /^[a-zA-Z0-9.%:,\s]+$/;
    if (!patron_detalles.test(detalles_producto) || detalles_producto.lenght > 250) {
      $("#error_detalles").css("display", "block");
      detalles_valido = false;
    } else {
      $("#error_detalles").css("display", "none");
      detalles_valido = true;
    }
  });

  $("#unidades").blur(function () {
    var unidades = $("#unidades").val();
    var patron_unidades = /^[0-9]+$/;
    if (!patron_unidades.test(unidades)) {
      $("#error_unidades").css("display", "block");
      unidades_valido = false;
    } else {
      $("#error_unidades").css("display", "none");
      unidades_valido = true;
    }
  });
  $("#imagen").blur(function () {
    var img_producto = $("#imagen").val();
    var patron_img = /^[a-zA-Z0-9./_]+$/;
    if (!patron_img.test(img_producto)) {
      $("#error_imagen").css("display", "block");
      img_valido = false;
    } else {
      $("#error_imagen").css("display", "none");
      img_valido = true;
    }
  });
  $("#name").keyup(function (e) { 
    if ($("#name").val()) {
      let name = $("#name").val();
      console.log(name);
      $.ajax({
        type: "GET",
        url: "http://localhost:3000/practicas/pObjetos/backend/product-insertbyname.php",
        data: { name },
        success: function (response) {
          console.log(response);
          let productos = JSON.parse(response);
          if (Object.keys(productos).length > 0) {
            let template_bar = "";
            template_bar += `
                              <li style="list-style: none;">status: Error al agregar producto </li>
                              <li style="list-style: none;">message: Producto ya registrado en la base de datos</li>
                          `;
            $("#product-result").attr("class", "card my-4 d-block");
            $("#container").html(template_bar);
          }else{
            $("#product-result").attr("class", "card my-4 d-none");
          }
        },
      });
    }
  });

  $("#product-form").submit(function (e) {
    var validado_total = true;
    validado_total = nombre_valido && precio_valido && unidades_valido && modelo_valido && marca_valido && detalles_valido && img_valido;
    console.log(validado_total);
    if (validado !=validado_total || editar == true) {
      var productoJSON = {
      marca: $("#marca").val(),
      modelo: $("#modelo").val(),
      precio: $("#precio").val(),
      detalles: $("#detalles").val(),
      unidades: $("#unidades").val(),
      imagen: $("#imagen").val(),
    };

    productoJSON["nombre"] = $("#name").val();
    productoJSON["id"] = $("#productId").val();
    productoJsonString = JSON.stringify(productoJSON, null, 2);

    let url =
      editar === false
        ? "http://localhost:3000/practicas/pObjetos/backend/product-add.php"
        : "http://localhost:3000/practicas/pObjetos/backend/product-edit.php";
    console.log(url);

    $.post(url, productoJsonString, function (response) {
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
    });
  }
    e.preventDefault();
    
  });

  function fetchProducts() {
    $.ajax({
      url: "http://localhost:3000/practicas/pObjetos/backend/product-list.php",
      type: "GET",
      success: function (response) {
        let prods = JSON.parse(response);
        console.log(prods);
        if (Object.keys(prods).length > 0) {
        
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
        }
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
        let template_bar = "";
        template_bar += `
                          <li style="list-style: none;">status: ${respuesta.status} </li>
                          <li style="list-style: none;">message: ${respuesta.message } </li>
                      `;
        $("#product-result").attr("class", "card my-4 d-block");
        $("#container").html(template_bar);
      });
    }
  });
  $(document).on("click", ".product-item", function () {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr("productId");
    $.get(
      "http://localhost:3000/practicas/pObjetos/backend/product-single.php",
      { id },
      function (response) {
        const producto = JSON.parse(response);
        $("#name").val(producto.nombre);
        $("#marca").val(producto.marca);
        $("#modelo").val(producto.modelo);
        $("#detalles").val(producto.detalles);
        $("#precio").val(producto.precio);
        $("#unidades").val(producto.unidades);
        $("#imagen").val(producto.imagen);
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
        $("#productId").val(producto.id);
        editar = true;
      }
    );
  });
});
