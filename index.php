<?php
/* Find large number using switch case */

//solution 01:
$number1 = 60;
$number2 = 40;
$number3 = 60;

switch ( true ) {
case ( $number1 == $number2 && $number1 == $number3 ):
    echo "All number are equal";
    break;
case ( $number1 >= $number2 && $number1 >= $number3 ):
    echo "The larger number is $number1";
    break;
case ( $number2 >= $number3 ):
    echo "The larger number is $number2";
    break;
default:
    echo "The larger number is $number3";
}
