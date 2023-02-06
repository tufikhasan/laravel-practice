<?php
/* How to find Leap year  */

$year = 1900;

//solution 01:
if ( $year % 4 == 0 && $year % 100 == 0 && $year % 400 == 0 ) {
    echo "{$year} is a leap year\n";
} elseif ( $year % 4 == 0 && $year % 100 == 0 ) {
    echo "{$year} is not a leap year\n";
} elseif ( $year % 4 == 0 ) {
    echo "{$year} is a leap year\n";
} else {
    echo "{$year} is not a leap year\n";
}

//solution 02:
if ( $year % 4 == 0 && ( $year % 100 != 0 || $year % 400 == 0 ) ) {
    echo "{$year} is a leap year\n";
} else {
    echo "{$year} is not a leap year\n";
}