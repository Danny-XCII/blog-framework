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