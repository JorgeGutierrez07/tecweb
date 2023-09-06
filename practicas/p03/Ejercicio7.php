     <?php
    echo'<h2>Ejercicio 7</h2>';
    echo'<ol type = "1">';
    echo'<li>';
    echo'<p>La versión de Apache y PHP</p>';

        $version = apache_get_version();
        echo "<p>Version actual de apache: $version</p>";
        echo '<p>Version actual de PHP: </php>' . phpversion();
    echo'</li> <li>';
    echo'<p>El nombre del sistema operativo (servidor)</p>';
        echo php_uname();
    echo'</li>';
    echo'<li>';
    echo'<p>Idioma del navegador (cliente)</p>';
            $idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            echo $idioma;
    echo'</li>';
    echo'</ol>';
    ?>