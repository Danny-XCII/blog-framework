<?php

class Request {

    public static function uri() {

        return trim( parse_url( $_SERVER[ "REQUEST_URI" ], PHP_URL_PATH ), "/" );

    }

    public static function method() {

        return $_SERVER[ "REQUEST_METHOD" ];

    }

    public static function get( $getVar = null ) {

        if ( self::method() == "GET" ) {

            if ( $getVar !== null ) {

                if ( isset( $_GET[ $getVar ] ) ) {

                    return $_GET[ $getVar ];

                } else {

                    return "Not defined.";

                }

            } else {

                return $_GET;

            }

        } else {

            return false;

        }

    }

    public static function post( $postVar = null ) {

        if ( self::method()  == "POST" ) {

            if ( $postVar !== null ) {

                if ( isset( $_POST[ $postVar ] ) ) {

                    return $_POST[ $postVar ];

                } else {

                    return "Not defined.";

                }

            } else {

                return $_POST;

            }

        } else {

            return false;

        }

    }

}