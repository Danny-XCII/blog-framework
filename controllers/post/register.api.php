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

    $errors[] = "Something went wrong.";

}

if ( !isset( $errors ) ) {

    $usernameExists = $database->usernameExists( $username );
    $emailExists = $database->emailExists( $emailAddress );

    if ( !$usernameExists && !$emailExists ) {

        $database->addUser( $username, $password, $emailAddress );

        var_dump( $database->loginUser( $username, $password ) );

    } else {

        if ( $usernameExists ) : $errors[] = "That username is already in use. Please choose an alternative username."; endif;

        if ( $emailExists ) : $errors[] = "That email address is already associated with an account, please use an alternative email address."; endif;

    }

}

include "./views/register.view.php";