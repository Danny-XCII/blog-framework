<?php

global $app;
global $database;

$pageTitle = "Register";

$username = Request::post( "username" );
$password = Request::post( "password" );
$confirmPassword = Request::post( "confirm_password" );
$emailAddress = Request::post( "email" );

if ( $password !== $confirmPassword ) {

    $errors[] = "Passwords don't match.";

}

if ( strlen( $username ) < 5 ) {

    $errors[] = "Username too short. Your username must contain at least 5 characters.";

}

if ( strlen( $password ) < 7 ) {

    $errors[] = "Password too short. Your password must contain at least 7 characters.";

}

if ( $emailAddress == "" ) {

    $errors[] = "Please enter your email address.";

}

if ( !isset( $username ) or !isset( $emailAddress ) or !isset( $confirmPassword ) or !isset( $password ) ) {

    /*
     * The user likely shouldn't ever encounter this error.
     */
    $errors[] = "Something went wrong. Please try again.";

}

if ( !isset( $errors ) ) {

    $addUser = $database->addUser( $username, $password, $emailAddress );

    if ( !$addUser ) : $errors[] = $addUser; endif;

}

include "./views/register.view.php";