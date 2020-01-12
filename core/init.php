<?php

/*
 *
 * Establish database connection.
 *
 * Call in Router and define routes for routing system.
 *
 */

session_start();

require_once "./core/config/global.config.php";
require_once "./core/request/request.class.php";
require_once  "./core/router/router.class.php";
require_once "./core/database/database.class.php";

$database = new Database( $dbConfig );

if ( isset( $_SESSION[ "logged_in" ] ) ) {

    $user = $database->getUserByUsername( $_SESSION[ "username" ] );
    $user->is_admin = $user->role;

}

$uri = Request::uri();

/*
 * Fake query strings
 */
$uriParts = explode( "/", $uri );
$queryPages = array( "post", "category", "edit-post" );

foreach ( $queryPages as $queryPage ) {

    if ( in_array( $queryPage, $uriParts ) ) {

        $get = $uriParts[ count( $uriParts ) - 1 ];
        array_pop( $uriParts );
        $uri = "";

        for ( $i = 0; $i < ( count( $uriParts ) ); $i++ ) {

            $uri .= $uriParts[ $i ] . "/";

        }

        $uri = trim( $uri, "/" );

    }

}