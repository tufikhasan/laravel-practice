<?php
/** Module 2 Assignment:
 * HF consultancy wants to build a very simple commission-calculating calculator for their Admission agents. Usually, the commission is twenty-five percent of the tuition fee if the tuition is above twenty thousand dollars. But if the tuition fee is above ten thousand dollars but less than twenty thousand dollars, the commission is twenty percent. If the tuition fee is less than ten thousand dollars but greater than seven thousand dollars,  the commission rate is fifteen percent. If the tuition fee is below seven thousand dollars the data will be invalid. As a developer please help HF Consultancy for building this simple calculator using a ternary operator in Php.
 */
$tuitionFee = 20000;
$commission = ( $tuitionFee >= 20000 ) ? ( "Commission 25% = " . $tuitionFee * 25 / 100 ) : (  ( $tuitionFee >= 10000 && $tuitionFee < 20000 ) ? ( "Commission 20% = " . $tuitionFee * 20 / 100 ) : (  ( $tuitionFee >= 7000 && $tuitionFee < 10000 ) ? ( "Commission 15% = " . $tuitionFee * 15 / 100 ) : "Invalid tuition fee" ) );

echo "$commission";