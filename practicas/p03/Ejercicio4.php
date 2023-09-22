<?php
$a2 = "PHP5";
    $z2[] = &$a2;
    $b2 = "5a version de PHP";
    @$c2 = $b2 * 10;
    $a2 .= $b2;
    @$b2 *= $c2;
    $z2[0] = "MySQL";
    ?>
    <ul>
        <li>
            <?php
            function leer()
            {
                global $a2, $b2, $c2, $r, $z2;
                $r = $a2 . $b2 . $c2 . print_r($z2);
            };
            leer();
            ?>
        </li>
    </ul>