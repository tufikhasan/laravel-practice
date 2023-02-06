<?php
/* Write a program to check whether the given number is positive or negative using  ternary operator */

//solution 01:
$number = 4;
echo ( $number > 0 ) ? "$number is a positive number" : (  ( 0 == $number ) ? "Zero is neither positive or negative number" : "$number is a negative number" );
