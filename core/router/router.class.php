<?php

class Router {

    protected $routes = array(

        "GET" => array(),

        "POST" => array()

    );

    public static function create( $routes ) {

        $router = new static;

        include $routes;

        return $router;

    }

    public function get( $uri, $controller ) {

        $this->routes[ "GET" ][ $uri ] = $controller;

    }

    public function post( $uri, $controller ) {

        $this->routes[ "POST" ][ $uri ] = $controller;

    }

    public function direct( $uri, $method ) {

        if ( array_key_exists( $uri, $this->routes[ $method ] ) ) {

            include $this->routes[ $method ][ $uri ];

        } else {

            include $this->routes[ "GET" ][ "not-found" ];

        }

    }

}