<?php
/* write a program to swap the values of two variables. */

//solution 01:
$num1 = 26;
$num2 = 72;
$num1 += $num2; // 26 + 72 = 98; now num1 = 98;
$num2 = $num1 - $num2; // 98 - 72 = 26; now num2 = 26
$num1 -= $num2; // 98 - 26 = 72; now num1 = 72
echo "Now num1 = $num1, num2 = $num2 \n";

//solution 02:
$number1 = 1;
$number2 = 2;

$temp = $number1;
$number1 = $number2;
$number2 = $temp;
echo "Now number1 = $number1, number2 = $number2";