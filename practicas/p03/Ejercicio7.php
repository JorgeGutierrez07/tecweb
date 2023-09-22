<ol>
        <li>
            <p>Version de Apache</p>
            <?php
            $version = phpversion();
            echo "<p>Version actual de apache: $version</p>";
            echo '<p>Version actual de PHP: </p>' . phpversion();
            ?>
        </li>
        <li>
            <?php
            echo '<p>El nombre del sistema operativo (servidor)</p>';
            echo php_uname();
            ?>
        </li>
        <li>
            <?php
            echo '<p>Idioma del navegador (cliente)</p>';
            $idioma = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            echo $idioma;
            ?>
        </li>
    </ol>