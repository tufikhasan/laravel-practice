<?php
/* Write a program to find even or odd number - (both negative or positive)  */

//Solution 01: nested
$num = -23;
$r = $num % 2;
switch ( $r ) {
case 0:
    switch ( $num ) {
    case $num > 0:
        echo "{$num} Positive Even number\n";
        break;
    case $num < 0:
        echo "{$num} Negative Even number\n";
        break;
    }
    break;
default:
    switch ( $num ) {
    case $num > 0:
        echo "{$num} Positive Odd number\n";
        break;
    case $num < 0:
        echo "{$num} Negative Odd number\n";
        break;
    }
}

//Solution 02:
$num = -3;
$r = $num % 2;
switch ( true ) {
case ( 0 == $r && $num > 0 ):
    echo "$num is a positive even number";
    break;
case ( 1 == $r && $num > 0 ):
    echo "$num is a positive odd number";
    break;
case ( 0 == $r && $num < 0 ):
    echo "$num is a negative even number";
    break;
case ( -1 == $r && $num < 0 ):
    echo "$num is a negative odd number";
    break;
}

echo "\n";

//Solution 03:
$num = -3;
$r = abs( $num ) % 2;
switch ( true ) {
case ( 0 == $r && $num > 0 ):
    echo "$num is a positive even number";
    break;
case ( 1 == $r && $num > 0 ):
    echo "$num is a positive odd number";
    break;
case ( 0 == $r && $num < 0 ):
    echo "$num is a negative even number";
    break;
case ( 1 == $r && $num < 0 ):
    echo "$num is a negative odd number";
    break;
}