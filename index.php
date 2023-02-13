<?php
//01 Problem: Write a Reusable  PHP Function that can check Even & Odd Number And Return Decision
function isEvenOrOdd( int $num ): string {
    $r = $num % 2;
    if ( $r == 0 && $num > 0 ) {
        return "{$num} is an Positive Even number";
    } elseif ( $r == 0 && $num < 0 ) {
        return "{$num} is an Negative Even number";
    } elseif ( $r == 1 && $num > 0 ) {
        return "{$num} is an Positive Odd number";
    } elseif ( $r == -1 && $num < 0 ) {
        return "{$num} is an Negative Odd number";
    } else {
        return "{$num} is neither Positive nor Negative";
    }
}
echo isEvenOrOdd( 25 );
echo "\n";
echo isEvenOrOdd( -5 );
echo "\n";

//02 Problem: 1+2+3...…….100  Write a loop to calculate the summation of the series
$sum = 0;
for ( $i = 1; $i <= 100; $i++ ) {
    $sum += $i;
}
echo "Sum of the series (1+2+3……….100) = {$sum}";