<?php

require_once "./core/init.php";

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

Router::create( "./core/router/routes.php" )->direct( $uri, Request::method() );
