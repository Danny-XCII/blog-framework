<?php

require_once "./core/init.php";

$uri = Request::uri();
$requestUri = explode( "/", $uri );

if ( in_array( "post", $requestUri ) ) {

    $uri = "post";
    $requestLength = count( $requestUri );
    $get = $requestUri[ $requestLength - 1 ];

}

if ( in_array( "category", $requestUri ) ) {

    $uri = "category";
    $requestLength = count( $requestUri );
    $get = $requestUri[ $requestLength - 1 ];

}

Router::create( "./core/router/routes.php" )->direct( $uri, Request::method() );
