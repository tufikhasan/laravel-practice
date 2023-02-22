<?php
//Problem: Complete the function that accepts a string parameter, and reverses each word in the string. All spaces in the string should be retained.

$str = "This is an   example!";

//solution 01:
function reverseWords( $str ) {
    return implode( ' ', array_map( 'strrev', explode( " ", $str ) ) );
}
echo reverseWords( $str );

//solution 02:
// function reverseWords( $str ) {
//     $words = explode( ' ', $str );

//     $reversedWords = array_map( function ( $str ) {
//         $reversedChars = str_split( $str );
//         $reversedChars = array_reverse( $reversedChars );
//         return implode( '', $reversedChars );
//     }, $words );

//     return implode( ' ', $reversedWords );
// }
