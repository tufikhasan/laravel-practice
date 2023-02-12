<?php
/*
Problem: Write a function that takes an array of integers and a target sum as input , and returns a boolean indicating whether there exists a pair of integers in the array that add up to the target sum. You can assume the array has at least two elements and all elements are unique. use a loop in your solution.

input: [5,7,1,2,8,4,3],8
output: true(because 5+3)8
 */
function hasPairWithSum( $arr, $target_sum ) {
    for ( $i = 0; $i < count( $arr ); $i++ ) {
        for ( $j = $i + 1; $j < count( $arr ); $j++ ) {
            if ( $arr[$i] + $arr[$j] == $target_sum ) {
                return true;
            }
        }
    }
    return false;
}
$result = hasPairWithSum( [5, 7, 1, 2, 8, 4, 3], 8 );
if ( $result ) {
    echo "True";
} else {
    echo "False";
}