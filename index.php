<?php
/*********** Multiplication Table */

function multiplicationTable( int $num ) {
    for ( $i = 1; $i <= 10; $i++ ) {
        echo "$i x $num = " . $i * $num . PHP_EOL;
    }
}
multiplicationTable( 3 );