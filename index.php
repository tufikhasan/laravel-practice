<?php
/*
Problem:
Write a function toWeirdCase (weirdcase in Ruby) that accepts a string, and returns the same string with all even indexed characters in each word upper cased, and all odd indexed characters in each word lower cased. The indexing just explained is zero based, so the zero-ith index is even, therefore that character should be upper cased and you need to start over for each word.

The passed in string will only consist of alphabetical characters and spaces(' '). Spaces will only be present if there are multiple words. Words will be separated by a single space(' ').

Examples:
toWeirdCase("String"); // => returns "StRiNg"
toWeirdCase("Weird string case"); // => returns "WeIrD StRiNg CaSe"
 */

// //solution 01:
function toWeirdCase( $string ) {
    $arr = array_map( function ( $word ) {
        $w = "";
        for ( $i = 0; $i < strlen( $word ); $i++ ) {
            if ( $i % 2 == 0 ) {
                $w .= strtoupper( $word[$i] );
            } else {
                $w .= strtolower( $word[$i] );
            }
        }
        return $w;
    }, explode( " ", $string ) );
    return implode( " ", $arr );
}

// //solution 02:
// function toWeirdCase( $string ) {
//     $words = explode( ' ', $string );
//     foreach ( $words as &$word ) {
//         for ( $i = 0; $i < strlen( $word ); $i++ ) {
//             $word[$i] = ( $i % 2 === 0 ) ? strtoupper( $word[$i] ) : strtolower( $word[$i] );
//         }
//     }
//     return implode( ' ', $words );
// }

echo toWeirdCase( "Weird string case" );