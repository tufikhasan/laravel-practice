<?php

/*********** Find biggest word in a string */

//01:
function biggestWord( $str ) {
    $words = explode( " ", $str );
    $bigWord = "";
    foreach ( $words as $word ) {
        if ( strlen( $word ) > strlen( $bigWord ) ) {
            $bigWord = $word;
        }
    }
    return $bigWord;
}
$str = "The quick brown fox jumped over the lazy dog";
echo biggestWord( $str );

// //02:
// function longestWord( $str ) {
//     $str = preg_replace( '/[^A-Za-z0-9 ]/', '', $str );

//     $words = explode( ' ', $str );

//     $longest_word = '';

//     foreach ( $words as $word ) {
//         if ( strlen( $word ) > strlen( $longest_word ) ) {
//             $longest_word = $word;
//         }
//     }
//     return $longest_word;
// }
// $str = "The quick brown fox jumped over the lazy dog";
// echo longestWord( $str );
