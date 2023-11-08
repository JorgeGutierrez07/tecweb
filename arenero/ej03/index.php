<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    use EJEMPLOS\POO\Cabecera2 as Cabecera;
    require_once __DIR__ ."/Cabecera.php";

    $cab1 = new Cabecera('Em rebanho somos mais fortes','center', 'https://google.com');
    $cab1->graficar();
    ?>
</body>
</html>