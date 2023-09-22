<?php
    $a1 = "PHP5";
    echo  "<p>Contenido de la variable a es:  $a1</p>";
    ?>
    <p>Contenido de la variable z es: </p>
    <ul>
        <li>
            <?php
            $z1[] = &$a1;
            print_r($z1);
            ?>
        </li>
    </ul>
    <?php
    $b1 = "5a version de PHP";
    echo  "<p>Contenido de la variable b es:  $b1</p>";
    @$c1 = $b1 * 10;
    ?>
    <?php
    echo  "<p>Contenido de la variable c es:  $c1</p>";
    $a1 .= $b1;
    echo  "<p>Contenido de la variable a renombrada es:  $a1 </p>";
    @$b1 *= $c1;
    echo  "<p>Contenido de la variable b renombrada es:  $b1 </p>";
    ?>
    <p>Contenido de la variable z renombrada es: </p>
    <ul>
        <li>
            <?php
            $z1[0] = "MySQL";
            print_r($z1);
            ?>
        </li>
    </ul>