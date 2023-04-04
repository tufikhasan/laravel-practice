<?php
include_once "./functions.php";
if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS );
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );
    $sub = filter_input( INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS );
    $message = filter_input( INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS );

    if (  ( new Blogs() )->sendMessage( $name, $email, $sub, $message ) ) {
        header( "location: ../contact.php?message=success" );
    } else {
        header( "location: ../contact.php?message=failed" );
    }
}
