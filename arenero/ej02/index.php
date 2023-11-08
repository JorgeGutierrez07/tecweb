<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once __DIR__ .'/Menu.php';
    $men1 = new Menu;
    $men1->cargar_opciones('https://facebook.com', 'Facebook');
    $men1->cargar_opciones('https//buap.mx','Buap');
    $men1->cargar_opciones('https://google.com', 'Google');
    $men1->mostrar();
    ?>
</body>
</html>