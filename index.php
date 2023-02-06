<?php
/* Write a program to check student grade based on the marks using if-else statement.

Conditions:
-> If marks are 60% or more, grade will be First Division.
-> If marks between 45% to 59%, grade will be Second Division.
-> If marks between 33% to 44%, grade will be Third Division.
-> If marks are less than 33%, student will be Fail.
 */
$marks = 60;

//solution using - if...elseif...else
if ( $marks >= 60 && $marks <= 100 ) {
    echo "First Division\n";
} elseif ( $marks >= 45 && $marks < 60 ) {
    echo "Second Division\n";
} elseif ( $marks >= 33 && $marks < 45 ) {
    echo "Third Division\n";
} elseif ( $marks > 0 && $marks < 33 ) {
    echo "Fail\n";
} else {
    echo "Invalid marks\n";
}

//solution using ternary operator:
$result = ( $marks >= 80 && $marks <= 100 ) ? "A+" : (  ( $marks >= 70 && $marks < 80 ) ? "A" : (  ( $marks < 33 && $marks > 0 ) ? "Fail" : (  ( $marks >= 60 && $marks < 70 ) ? "A-" : (  ( $marks >= 50 && $marks < 60 ) ? "B" : (  ( $marks >= 40 && $marks < 50 ) ? "C" : (  ( $marks >= 33 && $marks < 40 ) ? "D" : "invalid marks" ) ) ) ) ) );
echo $result;