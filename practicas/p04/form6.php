<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.1//EN” “http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd”>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Formu 6 </title>
    <html lang="es">
</head>

<body>
    <?php
    $carros = array();
    $carros['ABC123'] = array(
        "auto" => array(
            "Marca" => "Audi",
            "Modelo"  => "A6",
            "Tipo"  => "Sedán"
        ),
        "propietario" => array(
            "Nombre" => 'Jorge Cortés',
            "Ciudad" => 'Tlaxcala',
            "Direccion" => 'Priv Adolfo Lopez Mateos'
        )
    );
    $carros['def456'] = array(
        "auto" => array(
            "Marca" => "Toyota",
            "Modelo"  => "Corolla",
            "Tipo"  => "Sedán"
        ),
        "propietario" => array(
            "Nombre" => 'Maria Rodriguez',
            "Ciudad" => 'Monterrey',
            "Direccion" => 'Calle de los Pinos'
        )
    );

    $carros['ghi789'] = array(
        "auto" => array(
            "Marca" => "Honda",
            "Modelo"  => "Civic",
            "Tipo"  => "Sedán"
        ),
        "propietario" => array(
            "Nombre" => 'Carlos Pérez',
            "Ciudad" => 'Guadalajara',
            "Direccion" => 'Avenida Principal'
        )
    );

    $carros['jkl234'] = array(
        "auto" => array(
            "Marca" => "Ford",
            "Modelo"  => "Escape",
            "Tipo"  => "SUV"
        ),
        "propietario" => array(
            "Nombre" => 'Ana Lopez',
            "Ciudad" => 'Puebla',
            "Direccion" => 'Calle de las Flores'
        )
    );

    $carros['mno567'] = array(
        "auto" => array(
            "Marca" => "Chevrolet",
            "Modelo"  => "Silverado",
            "Tipo"  => "Camioneta Pickup"
        ),
        "propietario" => array(
            "Nombre" => 'Pedro Sánchez',
            "Ciudad" => 'Ciudad de México',
            "Direccion" => 'Calle de los Robles'
        )
    );

    $carros['pqr890'] = array(
        "auto" => array(
            "Marca" => "Volkswagen",
            "Modelo"  => "Golf",
            "Tipo"  => "Hatchback"
        ),
        "propietario" => array(
            "Nombre" => 'Luis González',
            "Ciudad" => 'Tijuana',
            "Direccion" => 'Avenida de las Palmas'
        )
    );

    $carros['stu345'] = array(
        "auto" => array(
            "Marca" => "BMW",
            "Modelo"  => "X3",
            "Tipo"  => "SUV"
        ),
        "propietario" => array(
            "Nombre" => 'Isabel Martinez',
            "Ciudad" => 'Ciudad Juárez',
            "Direccion" => 'Calle de las Aves'
        )
    );

    $carros['vwx678'] = array(
        "auto" => array(
            "Marca" => "Mercedes-Benz",
            "Modelo"  => "C-Class",
            "Tipo"  => "Sedán"
        ),
        "propietario" => array(
            "Nombre" => 'Roberto Mendoza',
            "Ciudad" => 'Mérida',
            "Direccion" => 'Calle de los Tulipanes'
        )
    );

    $carros['yz1901'] = array(
        "auto" => array(
            "Marca" => "Nissan",
            "Modelo"  => "Altima",
            "Tipo"  => "Sedán"
        ),
        "propietario" => array(
            "Nombre" => 'Laura Fernández',
            "Ciudad" => 'Cancún',
            "Direccion" => 'Avenida de las Rosas'
        )
    );

    $carros['abc234'] = array(
        "auto" => array(
            "Marca" => "Jeep",
            "Modelo"  => "Wrangler",
            "Tipo"  => "Todo Terreno"
        ),
        "propietario" => array(
            "Nombre" => 'Fernando González',
            "Ciudad" => 'San Luis Potosí',
            "Direccion" => 'Calle de los Cerezos'
        )
    );

    $carros['def567'] = array(
        "auto" => array(
            "Marca" => "Hyundai",
            "Modelo"  => "Tucson",
            "Tipo"  => "SUV"
        ),
        "propietario" => array(
            "Nombre" => 'Rosa Ramirez',
            "Ciudad" => 'Acapulco',
            "Direccion" => 'Calle de las Palmas'
        )
    );

    $carros['ghi890'] = array(
        "auto" => array(
            "Marca" => "Subaru",
            "Modelo"  => "Outback",
            "Tipo"  => "Station Wagon"
        ),
        "propietario" => array(
            "Nombre" => 'Pablo Soto',
            "Ciudad" => 'Veracruz',
            "Direccion" => 'Avenida de los Pinos'
        )
    );

    $carros['jkl123'] = array(
        "auto" => array(
            "Marca" => "Kia",
            "Modelo"  => "Sportage",
            "Tipo"  => "SUV"
        ),
        "propietario" => array(
            "Nombre" => 'Carmen Morales',
            "Ciudad" => 'Hermosillo',
            "Direccion" => 'Calle de los Laureles'
        )
    );

    $carros["mno456"] = array(
        "auto" => array(
            "Marca" => "Mazda",
            "Modelo"  => "CX-5",
            "Tipo"  => "SUV"
        ),
        "propietario" => array(
            "Nombre" => 'Ricardo Silva',
            "Ciudad" => 'Querétaro',
            "Direccion" => 'Calle de las Magnolias'
        )
    );

    if (!empty($_POST['matricula'])) {
        $busqueda = $_POST['matricula'];
        $fin = true;
        foreach ($carros as $key => $value) {
            if ($busqueda == $key) {
                echo "La matricula <strong> $key </strong> contiene los datos:";
                echo "<pre>";
                print_r($value);
                echo "</pre>";
                $fin = true;
                break;
            } else {
                $fin = false;
            }
        }
        if ($fin == false) {
            echo "La matricula <strong> $busqueda </strong> NO se encuentra en el array";
        }
    }
    ?>
</body>

</html>