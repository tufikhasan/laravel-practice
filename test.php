<?php
$fileName = 'db/users.csv';
$file_ext = strtolower( pathinfo( $fileName, PATHINFO_EXTENSION ) );
echo $file_ext;

$img_rename = rename( $fileName, date( 'd-m-y-h-i-s' ) . "." . $file_ext );