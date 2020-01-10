<?php

global $app;
global $database;

$username = Request::post( "username" );
$password = Request::post( "password" );

$loginUser = $database->loginUser( $username, $password );

if ( $loginUser === true ) {

    header( "Location:login" );

} else {

    $errors[] = $loginUser;

}

if ( isset( $errors ) ) {

    $pageTitle = "Login";
    include "./views/login.view.php";

}