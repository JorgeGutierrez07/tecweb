<?php
    $a4 = "0";
    $b4 = "true";
    $c4 = false;
    $d4 = ($a4 or $b4);
    $e4 = ($a4 and $c4);
    $f4 = ($a4 xor $b4);
    ?>
    <p>$a4: </p>
    <ul>
        <li>
            <?php
            var_dump($a4);
            ?>
        </li>
    </ul>
    <p>$b4: </p>
    <ul>
        <li>
            <?php
            var_dump($b4);
            ?>
        </li>
    </ul>
    <p>$c4: </p>
    <ul>
        <li>
            <?php
            var_dump($c4);
            ?>
        </li>
    </ul>
    <p>$d4: </p>
    <ul>
        <li>
            <?php
            var_dump($d4);
            ?>
        </li>
    </ul>
    <p>$e4: </p>
    <ul>
        <li>
            <?php
            var_dump($e4);
            ?>
        </li>
    </ul>
    <p>$f4: </p>
    <ul>
        <li>
            <?php
            var_dump($f4);
            ?>
        </li>
    </ul>
    <p>Transformar el valor booleano de c y e </p>
    <?php
    echo '<div>';
    echo '<br/>';
    echo 'El valor booleano de $c4 es: ' . (@$c_bool4 ? 'TRUE' : 'FALSE') . "<br/>";
    echo 'El valor booleano de $e4 es: ' . (@$e_bool4 ? 'TRUE' : 'FALSE') . "<br/>";
    echo '</div>';
    ?>