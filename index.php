<?php
/*
Problem: Count Odd Numbers in an Interval Range.

Given two non-negative integers low and high. Return the count of odd numbers between low and high (inclusive).

Example 1:
Input: low = 3, high = 7
Output: 3
Explanation: The odd numbers between 3 and 7 are [3,5,7].

Example 2:
Input: low = 8, high = 10
Output: 1
Explanation: The odd numbers between 8 and 10 are [9].
 */

//SOLUTION - 01:
function countOdds( $low, $high ) {
    return floor(  ( $high + 1 ) / 2 ) - floor( $low / 2 );
}
echo countOdds( 3, 5 );

//SOLUTION - 02:
// function countOdds( $low, $high ) {
//     if ( $low % 2 == 0 ) {
//         $low++;
//     }
//     if ( $high % 2 == 0 ) {
//         $high--;
//     }

//     return (  ( $high - $low ) / 2 ) + 1;
// }
// echo countOdds( 3, 5 );

//SOLUTION - 03:
// function countOdds( $low, $high ) {
//     if ( $low % 2 == 0 && $high % 2 == 0 ) {
//         return (  ( $high - $low ) / 2 );
//     } elseif (  ( $low % 2 == 0 && $high % 2 != 0 ) || ( $low % 2 != 0 && $high % 2 == 0 ) ) {
//         return (  ( $high - $low - 1 ) / 2 ) + 1;
//     } elseif ( $low % 2 != 0 && $high % 2 != 0 ) {
//         return (  ( $high - $low - 2 ) / 2 ) + 2;
//     }
// }
// echo countOdds( 3, 5 );