<?php

require_once "./core/init.php";

$uri = Request::uri();

/*
 * Fake query strings
 */
$uriParts = explode( "/", $uri );
$queryPages = array( "post", "category" );

foreach ( $queryPages as $queryPage ) {

    if ( in_array( $queryPage, $uriParts ) ) {

        $uri = $queryPage;
        $get = $uriParts[ count( $uriParts ) - 1 ];

    }

}

Router::create( "./core/router/routes.php" )->direct( $uri, Request::method() );
